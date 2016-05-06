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

$categories_display_order_array = array();

$limit = $config['DISPLAY_ORDER_LIMIT'];

$new_do_array = array();

// Checks if categories has display order 0 or non hundreds divided (ex: 137)

$divided_by = false;
$non_zero_values = false;
foreach ($all_categories as $item)
{
    if($item['display_order'] % $limit !== 0){
        $divided_by = true;
    }

    if($item['display_order'] == 0){
        $non_zero_values = true;
    }
}

//If it has duplicates, or 0 value display order, or display order modulo 100 <> 0

$i = 1;
if($check_duplicates || $non_zero_values)
{ 

    $first = true;
    foreach ($all_categories as $item) {

        if($first){
                $order_reference = $limit ;
                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $item['category_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Category -> update_category($new_item_dispay_order);              
                $new_do_array[$i] = $order_reference;
                $previous_do = (int)$order_reference;
                //$new_categories = ;
                $all_categories[$i-1] = $new_item_dispay_order;
        }
        else{   

                $order_reference = ceil($i*100 / $limit) * $limit;
                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $item['category_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Category -> update_category($new_item_dispay_order);
                $previous_do = (int)$order_reference;
                $new_do_array[$i] = (int)$order_reference;
                $all_categories[$i-1] = $new_item_dispay_order;
        }
        $i++;  

        $first = false;
   }

}

$x = 0;

foreach ($all_categories as $item) {
    if ($item['category_id'] == $category_id) {
        $selected_array_id = $x;
        $order_reference = $item['display_order'];

        if ( $position == 'after') {
            $new_reference = $order_reference ;

        }
        else
        {
            //if position = before
            $new_reference = $order_reference ;

        }
        if ($new_reference < 0)
        {
            $new_reference = 0;
        }
    }

    $x ++ ;
}


 if ( $position == 'after') {

                $prev_item_dispay_order = array();
                $prev_item_dispay_order['category_id'] = $all_categories[$selected_array_id-1]['category_id'];
                $prev_item_dispay_order['display_order'] = (int)$all_categories[$selected_array_id]['display_order'];

                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $category_id;
                $new_item_dispay_order['display_order'] = (int)$all_categories[$selected_array_id-1]['display_order'];

                $Category -> update_category($new_item_dispay_order);
                $Category -> update_category($prev_item_dispay_order);
 }else{

                $next_item_dispay_order = array();
                $next_item_dispay_order['category_id'] =  $all_categories[$selected_array_id+1]['category_id'];
                $next_item_dispay_order['display_order'] = (int)$all_categories[$selected_array_id]['display_order'];

                $new_item_dispay_order = array();
                $new_item_dispay_order['category_id'] = $category_id;
                $new_item_dispay_order['display_order'] = (int)$all_categories[$selected_array_id+1]['display_order'];

                $Category -> update_category($new_item_dispay_order);
                $Category -> update_category($next_item_dispay_order);
 }


$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
