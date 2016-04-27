<?php
/**
 * Created by JetBrains PhpStorm.
 * User: razvan
 * Date: 6/3/12
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Site_settings
{
    protected $site_id;
    protected $property_id;
    protected $js_counter;
    protected $css_counter;
    protected $enable_redirect;
    protected $tracking_code;

    public function __construct($site_id)
    {
        global $db_connection;

        $site_id = intval($site_id);
        $this->site_id = $site_id;

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                    site_id,
                    url,
                    js_counter,
                    css_counter,
                    enable_redirect,
                    property_id,
                    tracking_code
                FROM
                    akiva_sites
                WHERE
                    site_id = $site_id
                LIMIT 1";
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);

        //print_r('<pre>');print_r($rs);print_r('</pre>');

        $this->js_counter = $rs->fields['js_counter'];
        $this->css_counter = $rs->fields['css_counter'];
        $this->enable_redirect = $rs->fields['enable_redirect'];
        $this->property_id = $rs->fields['property_id'];
        $this->tracking_code = $rs->fields['tracking_code'];
    }


    public function set_property_id($property_id)
    {
        global $db_connection;

        $property_id = mysql_real_escape_string($property_id);

        $sql = "
                # File: " . __FILE__ . "
                # Line: " . __LINE__ . "
                SELECT
                    site_id,
                    url,
                    js_counter,
                    css_counter,
                    enable_redirect,
                    property_id,
                    tracking_code
                FROM
                    akiva_sites
                WHERE
                    property_id = '$property_id'
                LIMIT 1";
        // echo "sql = '$sql' <br />\n";
        $rs = $db_connection->execute($sql);

        $this->site_id = $rs->fields['site_id'];
        $this->js_counter = $rs->fields['js_counter'];
        $this->css_counter = $rs->fields['css_counter'];
        $this->enable_redirect = $rs->fields['enable_redirect'];
        $this->property_id = $rs->fields['property_id'];
        $this->tracking_code = $rs->fields['tracking_code'];
    }


    public function fetch_js_counter()
    {
        return $this->js_counter;
    }

    public function fetch_css_counter()
    {
        return $this->css_counter;
    }

    public function is_redirect_enabled()
    {
        return $this->enable_redirect;
    }

    public function fetch_site_id()
    {
        return $this->site_id;
    }

    public function fetch_tracking_code()
    {
        return $this->tracking_code;
    }

    public function generate_slug($url)
    {
		// Take care of diacritics for the Romanian language;
		$url = str_replace('ă', 'a', $url);
		$url = str_replace('Ă', 'a', $url);
		$url = str_replace('â', 'a', $url);
		$url = str_replace('Â', 'a', $url);
		$url = str_replace('î', 'i', $url);
		$url = str_replace('Î', 'i', $url);
		$url = str_replace('ş', 's', $url);
        $url = str_replace('ș', 's', $url);
		$url = str_replace('Ş', 's', $url);
        $url = str_replace('Ș', 's', $url);
		$url = str_replace('ţ', 't', $url);
        $url = str_replace('ț', 't', $url);
		$url = str_replace('Ţ', 't', $url);
        $url = str_replace('Ț', 't', $url);

        // Prepare the string with some basic normalization;
        $url = strtolower(trim($url));
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);

        // Strip any unwanted characters
        $url = preg_replace("/[^a-z0-9_\s-]/", "-", $url);
        //$url = preg_replace("![^a-z0-9]+!i", "-", $url);

        // Clean multiple dashes or whitespaces
        $url = preg_replace("/[\s-]+/", " ", $url);

        // Convert whitespaces and underscore to dash
        $url = preg_replace("/[\s_]/", "-", $url);

        // Remove dash from edges;
        $url = trim($url, '-');

        return $url;
    }

/*
    public function fetch_meta_description($category_id, $title)
    {
        global $meta;

        $category_id = intval($category_id);
        $max = count($meta[$category_id]);

        $rand_nr = rand(0,$max);
        $meta = $meta [$category_id] [$rand_nr] . ":&nbsp;" . $title;

        return $meta;
    }
*/

}
