<?php
class Assets{

  function __construct()
  {
    global $db_connection;
  }

  function img_to_thumb($path)
  {
    global $config;

    if (file_exists($path)) {
      return $path;
    }else{
      

    $thumb_path = str_replace('assets', 'assets/thumbs', $path);

      $image = new Imagick($path);
      // If 0 is provided as a width or height parameter,
      // aspect ratio is maintained
      $image->thumbnailImage(280, 0);
      $image->setImageFormat ("jpeg");
      $image->stripImage();
      // Writes resultant image to output directory
      $image->writeImage($thumb_path);

      $thumb_path = str_replace($config['ASSETS_PATH_DIR'], '',$thumb_path);

    return $thumb_path;
    }
  }


  public function validate_asset($asset_dates)
  {
     global $db_connection, $config;

     $errorMsg=array();

     if(empty($asset_dates['file_type']))
     {
         $errorMsg['file_type'] = "<div>Invalid Type.</div>";
     }

     if($asset_dates['file']['size'] / 1024 > $config['MAX_UPLOAD_SIZE'])
     {
         $errorMsg['size'] = "<div>The uploaded file exceeds the upload_max_filesize allowed.</div>";
     }

  }

  function add_asset($asset_data, $is_moderated = 0)
  {
    global $db_connection, $config;

    if (!isset($asset_data['file']) || $asset_data['file'] == '')
    {
        throw new Exception("File is mandatory");
    }

    $target_path = $config['ASSETS_PATH_DIR']."/"; 

    $target_path = $target_path . $asset_data['local_file_name'];
 

    if(move_uploaded_file($asset_data['file']['tmp_name'], $target_path))
    {
        $local_file_name = $db_connection->qstr($asset_data['local_file_name']);
        $public_name = $db_connection->qstr($asset_data['public_name']);
        $file_description = $db_connection->qstr($asset_data['file_description']);

        $file_type = ($asset_data['file_type'] == '')? "document" : $db_connection->qstr($asset_data['file_type']); //7 = Temp asset

        $file_size = $db_connection->qstr($asset_data['file']['size']);
        $file_extension = $db_connection->qstr($asset_data['file_extension']);
        $image_width = $db_connection->qstr($asset_data['image_width']);
        $image_height = $db_connection->qstr($asset_data['image_height']);

        $query  = "#File:". __FILE__ ."
        #Line: ".__LINE__ ."
        INSERT into
          akiva_assets(local_file_name, public_name, file_type, file_size, file_description, file_extension, image_width, image_height, creation_date, is_moderated)
        VALUES
          ($local_file_name,$public_name,$file_type, $file_size, $file_description, $file_extension, $image_width, $image_height, now(), $is_moderated)
        " ;

        $result= $db_connection->execute($query);

        if($result)
        {
            $last_asset_id = (int)$db_connection->Insert_ID();

            return $last_asset_id;
        }
        else
        {
            throw new Exception("File could not be created.");
        }
    }
    else
    {
        throw new Exception("File could not be created.");
    }

  }

  public function fetch_assets ($start = false, $limit = false, $order_by = 'creation_date', $sort_by = 'desc', $conditions = '')
  {

      global $db_connection, $config;

      $sort_by = strtolower($sort_by);
      switch ($sort_by)
      {
          case 'asc':
          case 'desc':
          case 'random':
              break;
          default:
              $sort_by = "desc";
      }
      $order_by = strtolower($order_by);
      switch ($order_by)
      {
          case 'asset_id':
          case 'creation_date':
          case 'public_name':
          case 'file_extension':
          case 'file_type':
          case 'last_updated_date':
          case 'file_size':
              break;
          default:
              $order_by = "creation_date";
      }

      $where = " WHERE 1 = 1 ";
      if ($conditions != '')
      {
          $where .= $conditions;
      }

      $db_connection->SetFetchMode(ADODB_FETCH_ASSOC);
      $query = "#File:". __FILE__ ."
        #Line: ".__LINE__ ."
      SELECT
        *
      FROM
        akiva_assets
              $where
        ORDER BY
            $order_by $sort_by";
      if (abs(intval($limit)) && abs(intval($start)) >= 0)
      {
          $query .= " LIMIT $start,$limit ";
      }

      //echo  $query;
      $result = $db_connection->execute($query);

      if($result)
      {
          $assets_list = array();
          $i=0;
          while (!$result->EOF)
          {
              $assets_list[] = $result->fields;
              $asset_path_file = $config['ASSETS_DIR'].'/'.$assets_list[$i]['local_file_name'];
              $thumb_path_file = $config['ASSETS_DIR'].'/thumbs/'.$assets_list[$i]['local_file_name'];
              #create img_to_thumb if it doesn't exist.
              if(file_exists($thumb_path_file))
              {
                $assets_list[$i]['image_out'] = '/thumbs/'.$assets_list[$i]['local_file_name'];
              }
              else
              {
                $assets_list[$i]['image_out'] = $this->img_to_thumb($asset_path_file);
              }

              $result->MoveNext();
              $i++;
          }
          return $assets_list;
      }
      else
      {
          return false;
      }
  }

    public function update_asset ($asset_data)
    {
        global $db_connection;

        if (!isset($asset_data['asset_id']))
        {
            throw new Exception("Asset id is missing.");
        }

        $asset_id = abs(intval($asset_data['asset_id']));

        $public_name = $db_connection->qstr($asset_data['public_name']);
        $file_description = $db_connection->qstr($asset_data['file_description']);
        $file_type = ($asset_data['file_type'] == '')? "document" : $db_connection->qstr($asset_data['file_type']); //7 = Temp asset
        $is_moderated = $db_connection->qstr($asset_data['is_moderated']);

        $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				UPDATE akiva_assets SET
				    asset_id = $asset_id
                    ";
        if ($public_name != '')
        {
            $query  .= " , public_name = $public_name";
        }
        if ($file_description != '')
        {
            $query  .= " , file_description = $file_description";
        }
        if ($file_type != '')
        {
            $query  .= " , file_type = $file_type";
        }
        if ($is_moderated != '')
        {
            $query  .= " , is_moderated = $is_moderated";
        }
        $query  .= "	WHERE
				    asset_id= $asset_id " ;

        $result= $db_connection->execute($query);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete_asset ($asset_id, $asset_filename)
    {
        global $db_connection, $config;
        //never delete asset_id 1
        //var_dump($asset_id);
        $asset_id = abs(intval($asset_id));
        if ($asset_id > 0)
        {
            $query  = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				DELETE FROM akiva_assets
				WHERE
				    asset_id= $asset_id " ;

            $result= $db_connection->execute($query);
            if($result)
            {
                $target_path = $config['ASSETS_DIR']."/";

                $unlink_asset = unlink($target_path . "/".$asset_filename);
                if ($unlink_asset)
                {
                    return true;
                }
                else
                {
                    return false;
                }

            }
            else
            {
                return false;
            }
        }

    }

    public function fetch_asset_by_id ($asset_id)
    {
        global $db_connection;

        $asset_id = abs(intval($asset_id));

        $query = "#File:". __FILE__ ."
				#Line: ".__LINE__ ."
				SELECT
					*
				FROM
					akiva_assets

				WHERE
					asset_id = $asset_id
				" ;

        $result = $db_connection->execute($query);

        if(!$result)
        {
            return false;
        }
        else
        {
            return $result->fields;

        }
    }

  public function count_assets ($conditions = '')
  {
      global $db_connection;

      $where = ' WHERE 1=1 ';
      if ($conditions != '')
      {
          $where .= $conditions;
      }

      $query = "#File:". __FILE__ ."
      #Line: ".__LINE__ ."
      SELECT
        COUNT(*) as total_assets
      FROM
        akiva_assets
        $where
      ";
      $result =  $db_connection ->execute($query);

      if($result)
      {

          return $result->fields['total_assets'];

      }
      else
      {

          return false;

      }
  }





}
