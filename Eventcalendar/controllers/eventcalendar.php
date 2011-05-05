<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventcalendar extends Base_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Eventcalendar_model', 'eventcalendar', true);
    }
    
    function index(){
            // The forth segment will be used as timeid
            $timeid = $this->uri->segment(4);

            if($timeid==0)
                    $time = time();
            else
                    $time = $timeid;

            // we call _date function 	
            $data = $this->_date($time);

            $this->output('index'); 
    }
          
    function _date($time){

            $this->template['events']   =   $this->eventcalendar->getEventsToCalendar($time);

            $today = date("Y/n/j", time());
            $this->template['today']    =   $today;

            $current_month = date("n", $time);
            $this->template['current_month']    =   $current_month;

            $current_year = date("Y", $time);
            $this->template['current_year'] =   $current_year;

            $current_month_text = date("F Y", $time);
            $this->template['current_month_text']   =   $current_month_text;

            $total_days_of_current_month = date("t", $time);
            $this->template['total_days_of_current_month']  =   $total_days_of_current_month;

            $first_day_of_month = mktime(0,0,0,$current_month,1,$current_year);
            $this->template['first_day_of_month'] = $first_day_of_month;

            //geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
            $first_w_of_month = date("w", $first_day_of_month);
            $this->template['first_w_of_month'] =   $first_w_of_month;

            //how many rows will be in the calendar to show the dates
            $total_rows = ceil(($total_days_of_current_month + $first_w_of_month)/7);
            $this->template['total_rows']   =   $total_rows;

            //trick to show empty cell in the first row if the month doesn't start from Sunday
            $day = -$first_w_of_month;
            $this->template['day']  =   $day;

            $next_month = mktime(0,0,0,$current_month+1,1,$current_year);
            $this->template['next_month']   =   $next_month;

            $next_month_text = date("F \'y", $next_month);
            $this->template['next_month_text']  =   $next_month_text;

            $previous_month = mktime(0,0,0,$current_month-1,1,$current_year);
            $this->template['previous_month']   =   $previous_month;

            $previous_month_text = date("F \'y", $previous_month);
            $this->template['previous_month_text']  =   $previous_month_text;

            $next_year = mktime(0,0,0,$current_month,1,$current_year+1);
            $this->template['next_year']    =   $next_year;

            $next_year_text = date("F \'y", $next_year);
            $this->template['next_year_text']   =   $next_year_text;

            $previous_year = mktime(0,0,0,$current_month,1,$current_year-1);
            $this->template['previous_year']    =   $previous_year;

            $previous_year_text = date("F \'y", $previous_year);
            $this->template['previous_year_text']   =   $previous_year_text;

        return;

    }
}