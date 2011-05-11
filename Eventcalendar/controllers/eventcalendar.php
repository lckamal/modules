<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventcalendar extends Base_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }
    
    function index(){
       echo 'Event Calendar';
    }
}