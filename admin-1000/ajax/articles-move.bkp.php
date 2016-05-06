

<?php

require('../inc/config.php');
//require('../inc/functions.php');

$Articles = new Articles();
$Sanitation = new Sanitation();

$position = $Sanitation->remove_html($_REQUEST['position'], true);
$article_id = abs(intval($_REQUEST['article_id']));


$where = array();
$all_articles = $Articles -> fetch_articles(false, false,'display_order','asc', implode(' ', $where));


// print_r('<pre>'); print_r($all_articles); print_r('</pre>');
// die();

//set up New displayOrder for each menu_item of this parent
$new_display_order = 0;
$order_reference = 0;
$new_added_display_order = 0;
foreach ($all_articles as $item) {
    if ($item['article_id'] == $article_id) {
        $order_reference = $item['display_order'];

        //print_r('<pre>'); print_r('initial = '.$order_reference); print_r('</pre>');

        if ( $position == 'after') {
            $new_reference = $order_reference + 1;

        }
        else
        {
            //if position = before
            $new_reference = $order_reference - 1;
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
//print_r('<pre>'); print_r('new = '.$menu_new_reference); print_r('</pre>');
foreach ($all_articles as $item) {
    if ( $position == 'after') {

        if ($item['article_id'] != $article_id)
        {
            if ($item['display_order'] == $order_reference + 1)
            {
                $new_item_dispay_order = array();
                $new_item_dispay_order['article_id'] = $item['article_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Articles -> update_article($new_item_dispay_order);

                // print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
            }
            else
            {
                /* $new_reference ++;
                 $new_item_dispay_order = array();
                 $new_item_dispay_order['menu_id'] = $item['menu_id'];
                 $new_item_dispay_order['display_order'] = (int)$new_reference;
                 $Menu -> update_menu_item($new_item_dispay_order);*/
            }

        }
        else
        {
            $new_item_dispay_order = array();
            $new_item_dispay_order['article_id'] = $item['article_id'];
            $new_item_dispay_order['display_order'] = (int)$menu_new_reference;
            $Articles -> update_article($new_item_dispay_order);

            // print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
        }
    }
    else
    {
        //if need to insert before
        if ($item['article_id'] != $article_id)
        {
            if ($item['display_order'] == $order_reference - 1)
            {
                $new_item_dispay_order = array();
                $new_item_dispay_order['article_id'] = $item['article_id'];
                $new_item_dispay_order['display_order'] = (int)$order_reference;
                $Articles -> update_article($new_item_dispay_order);

                //print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
            }
            else
            {
                /*$new_reference ++;
                $new_item_dispay_order = array();
                $new_item_dispay_order['menu_id'] = $item['menu_id'];
                $new_item_dispay_order['display_order'] = (int)$new_reference;
                $Menu -> update_menu_item($new_item_dispay_order);*/
            }

        }
        else
        {
            $new_item_dispay_order = array();
            $new_item_dispay_order['article_id'] = $item['article_id'];
            $new_item_dispay_order['display_order'] = (int)$menu_new_reference;
            $Articles -> update_article($new_item_dispay_order);

            //print_r('<pre>'); print_r($new_item_dispay_order); print_r('</pre>');
        }
    }
}

$response = 'ok';

$json_encoded = json_encode(array('response'=>$response), true);

/* Return JSON */
die($json_encoded);

//exit;
