<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventcalendar_model extends Base_model 
{
    public function __construct()
    {
        parent::__construct();
        
        $this->table =		'eventcalendar_module';
        $this->pk_name 	=	'id_event';
        $this->lang_table =     'eventcalendar_module_lang';
    }
    
    /*
     * Get All Events
     */
    function getEvents(){
        $events =   $this->db->get('eventcalendar_module');
        return $events->result_array();
    }
    /*
     * Get A Single Event Informations
     */
    function getEvent($eventID){
        $event  =   $this->db->get_where('eventcalendar_module', array('id_event' => $eventID));
        return $event->row_array();
    }
    /*
     * Get Event Translations
     */
    function getEventLang($eventID,$lang){
        $eventLang  = $this->db->get_where('eventcalendar_module_lang', array('id_event' => $eventID, 'lang' => $lang));
        return $eventLang->row_array();
    }
    /*
     * Save Event
     */
    function saveEvent($data){
        $this->db->insert('eventcalendar_module', $data);
        $eventID    =   $this->db->insert_id();
        return $eventID;
    }
    /*
     * Update Event
     */
    function updateEvent($eventID, $data){
            $this->db->where('id_event', $eventID);
        $this->db->update('eventcalendar_module', $data); 
        
        return $eventID;
    }
    /*
     * Save Event Translations
     */
    function saveEventLang($dataLang){
        $this->db->insert('eventcalendar_module_lang', $dataLang);
        return;
    }
    /*
     * Update Event Translations
     */
    function updateEventLang($eventID,$lang,$dataLang){
            $this->db->where(array('id_event' => $eventID, 'lang' => $lang));
        $this->db->update('eventcalendar_module_lang', $dataLang); 
        return;
    }
    /*
     * Delete Event And Event Translations
     */
    function deleteEvent($eventID)
    {
        $this->db->delete('eventcalendar_module', array('id_event' => $eventID));
        $this->db->delete('eventcalendar_module_lang', array('id_event' => $eventID));
        
        return;
    }
    
    /*
     * This Will Check Translation For Events
     */
    function _checkLangs($eventID)
    {
        foreach(Settings::get_languages() as $l){
            
        }
    }
}