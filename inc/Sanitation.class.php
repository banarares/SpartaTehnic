<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gabriela
 * Date: 11/3/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class Sanitation
{

    public function __construct()
    {
        global $db_connection;
    }


    public function remove_html($unsafe_string)
    {
		$config = HTMLPurifier_Config::createDefault();
		$config->set('Core.Encoding', "UTF-8"); // not using UTF-8
		$config->set('HTML.AllowedElements', array()); // Allow Nothing
		$purifier = new HTMLPurifier($config);

		$clear = $purifier->purify($unsafe_string);
		$clear = trim(preg_replace('/ +/', ' ', $clear));

        return $clear;
    }

    public function ucword($word){
        return strtoupper($word{0}) . substr($word, 1) . " ";
    }

    public function ucwordss($str, $exceptions) {

        $str = strtolower($str);
        $out = "";
        $words = explode(" ", $str);
        $words[0] = $this -> ucword($words[0]);
        foreach ($words as $word) {
            $out .= (!in_array($word, $exceptions)) ? $this -> ucword($word)  : $word . " ";
        }
        return rtrim($out);
    }

    public function prepare_for_database($unsafe_string)
    {
        global $db_connection;

        $unsafe_string = $db_connection->qstr($unsafe_string);
        $unsafe_string = trim($unsafe_string,"'");

        return $unsafe_string;
    }
}
