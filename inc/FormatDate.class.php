<?php
/**
 * Created by JetBrains PhpStorm.
 * User: razvan
 * Date: 6/3/12
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

class FormatDate
{

    protected $current_date;
    protected $long_months;
    protected $short_months;

    public function __construct()
    {
       // $this->long_months = array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
       // $this->short_months = array('Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');

        $this->long_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $this->short_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');

    }

    //format 25 Martie 2015, Ora 18:30
    public function long_format($current_date)
    {
        $str_date =  strtotime($current_date);
        $day = date('d', $str_date);
        $month = date('m', $str_date);
        $year = date('Y', $str_date);
        $time = date('G:i', $str_date);

        $format_date = $day. ' '. $this->long_months[(int)$month-1].' '.$year.' at '.$time;

        return $format_date;
    }

    //format 25 Martie 2015
    public function short_format($current_date)
    {
        $str_date =  strtotime($current_date);
        $day = date('d', $str_date);
        $month = date('m', $str_date);
        $year = date('Y', $str_date);

        $format_date = $day. ' '. $this->long_months[(int)$month-1].' '.$year;

        return $format_date;
    }

    public function fetch_months()
    {
        $months = array();
        $counter = 0;
        foreach ( $this->short_months as $index => $month) {
            $months[$counter]['id'] = str_pad($index+1, 2, '0', STR_PAD_LEFT); //add zero to single number: 4 => 04
            $months[$counter]['name'] = $month;
            $counter++;
        }
       // var_dump($months);
        return $months;
    }

    public function fetch_years()
    {
        $year_list = array();
        $maxYear = date('Y', strtotime('-17 year'));
        $minYear = $maxYear-100;
        $counter = 0;
        for ($i = $minYear; $i <= $maxYear; $i++){
            $year_list[$counter]['year'] = $i;
            $counter++;
        }
        $year_list = array_reverse($year_list, true);
        return $year_list;
    }

    public function fetch_days()
    {
        $days_list = array();
        $counter = 0;
        for ($i = 1; $i <= 31; $i++){
            $days_list[$counter]['day'] = $i;
            $counter++;
        }

        return $days_list;
    }

}
