<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Category = new Categories();
$Sanitation = new Sanitation();

$position = $Sanitation->remove_html($_REQUEST['position'], true);
$category_id = abs(intval($_REQUEST['category_id']));



$where = array();
$all_categories = $Category -> fetch_categories(false, false,'display_order','asc', implode(' ', $where));

//set up New displayOrder for each menu_item of this parent
$new_display_order = 0;
$order_reference = 0;
$new_added_display_order = 0;
 
$current_item = $Category -> fetch_category_by_id($category_id);
$check_duplicates = $Category -> check_for_duplicates_display_order();


foreach ($all_categories as $item) {
    if ($item['category_id'] == $category_id) {
        $order_reference = $item['display_order'];

        if ( $position == 'after') {
            $new_reference = $order_reference + 100;

        }
        else
        {
            //if position = before
            $new_reference = $order_reference - 100;
        }
        if ($new_reference < 0)
        {
            $new_reference = 0;
        }
        $menu_new_reference = $new_reference;

        /*$new_item_dispay_order = array();
        $new_item_dispay_order['menu_id'] = $item['menu_id'];
        $new_item_dispay_order['display_order'] = (int)$new_reference;
        $Menu -> update_menu_item($new_item_dispay_order);*/

    }

}
//var_dump($check_duplicates);

if($check_duplicates){
foreach ($all_categories as $item) {
    if ( $position == 'after') {

        if ($item['category_id'] != $category_id)
        {
            if ($item['display_order'] == $order_reference + 100)
            {
                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $item['category_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Category -> update_category($new_item_dispay_order);

                // print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
            }
            else
            {

                 #$new_reference ++;
                 #$new_item_dispay_order = array();
                 #$new_item_dispay_order['menu_id'] = $item['menu_id'];
                 #$new_item_dispay_order['display_order'] = (int)$new_reference;
                 #$Menu -> update_menu_item($new_item_dispay_order);
            }

        }
        else
        {
            $new_item_dispay_order = array();
            $new_item_dispay_order['category_id'] = $item['category_id'];
            $new_item_dispay_order['display_order'] = (int)$menu_new_reference;
            $Category -> update_category($new_item_dispay_order);

            // print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
        }
    }
    else
    {
        //if need to insert before
        if ($item['category_id'] != $category_id)
        {
            if ($item['display_order'] == $order_reference - 100)
            {
                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $item['category_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Category -> update_category($new_item_dispay_order);

                //print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
            }
            else
            {
                #$new_reference ++;
                #$new_item_dispay_order = array();
                #$new_item_dispay_order['menu_id'] = $item['menu_id'];
                #$new_item_dispay_order['display_order'] = (int)$new_reference;
                #$Menu -> update_menu_item($new_item_dispay_order);
            }

        }
        else
        {
            $new_item_dispay_order = array();
            $new_item_dispay_order['category_id'] = $item['category_id'];
            $new_item_dispay_order['display_order'] = (int)$menu_new_reference;
            $Category -> update_category($new_item_dispay_order);

            //print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
        }
    }
}
}

$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
