<?php

/**
 * Event Calendar TagManager 
 */
class Eventcalendar_Tags
{
    /**
     * <ion:eventcalendar>
     *      ..........
     * </ion:eventcalendar>
     */
    public static function index(FTL_Binding $tag)
    {
        $str = $tag->expand();
        return $str;
    }
    
    /*
     * <ion:eventcalendar>
     *      <ion:events>
     *          ..........
     *      </ion:events>
     * </ion:eventcalendar>
     */
    public static function events(FTL_Binding $tag)
    {
        $CI =& get_instance();
        // Loading Eventcalendar Model
        if (!isset($CI->eventcalendar_model)) $CI->load->model('eventcalendar_model', '', true);

        // Loading Events
        $events = $CI->eventcalendar_model->getEvents();

        if (isset($events)) 
                $tag->locals->count = sizeof( $events );
        else
                $tag->locals->count = 0;

        $output = "";

        foreach ($events as $event)
        {
                $tag->locals->event  = $event;
                
                $tag->locals->event_lang =  $CI->eventcalendar_model->getEventLang($event['id_event'],Settings::get_lang());
                
                $output .= $tag->expand();
        }

        return $output;
    }
    
    /*
     * <ion:id_event />
     */
    public static function id_event(FTL_Binding $tag)
    {
        return $tag->locals->event["id_event"];
    }
    
    /*
     * <ion:author />
     */
    public static function author(FTL_Binding $tag)
    {
        return $tag->locals->event["author"];
    }
    
    /*
     * <ion:created />
     */
    public static function created(FTL_Binding $tag)
    {
        return $tag->locals->event["created"];
    }
    
    /*
     * <ion:start_date />
     */
    public static function start_date(FTL_Binding $tag)
    {
        $startdate = ( ! empty($tag->locals->event["start_date"])) ? $tag->locals->event["start_date"] : '';
        return $startdate;
    }
    
    /*
     * <ion:end_date />
     */
    public static function end_date(FTL_Binding $tag)
    {
        $enddate = ( ! empty($tag->locals->event["end_date"])) ? $tag->locals->event["end_date"] : '';
        return $enddate;
    }
    
    /*
     * <ion:name />
     */
    public static function name(FTL_Binding $tag)
    {
        return $tag->locals->event["name"];
    }
    
    /*
     * <ion:url />
     */
    public static function url(FTL_Binding $tag)
    {
        return $tag->locals->event["url"];
    }
    
    /*
     * <ion:title />
     */
    public static function title($tag)
    {
        $title = ( ! empty($tag->locals->event_lang["title"])) ? $tag->locals->event_lang["title"] : '';
        return $title;
    }
    
    /*
     * <ion:subtitle />
     */
    public static function subtitle($tag)
    {
        $subtitle = ( ! empty($tag->locals->event_lang["subtitle"])) ? $tag->locals->event_lang["subtitle"] : '';
        return $subtitle;
    }
    
    /*
     * <ion:description />
     */
    public static function description($tag)
    {
        $description = ( ! empty($tag->locals->event_lang["description"])) ? $tag->locals->event_lang["description"] : '';
        return $description;
    }
    
    /*
     * Number of events
     */
    public static function count(FTL_Binding $tag)
    {
        $CI =& get_instance();
        if (!isset($CI->eventcalendar_model)) $CI->load->model('eventcalendar_model', '', true);

        $events = $CI->eventcalendar_model->getEvents();

        return sizeof( $events );
    }
}