<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventcalendar extends Module_Admin 
{     
    function construct(){
        $this->load->model('Eventcalendar_model', 'eventcalendar', true);
    }

    function index($year = null, $month = null)
    {
        $this->template['events']     =   $this->eventcalendar->getEvents();
        
        $this->output('admin/index');
    }
    
    function save()
    {
        $eventID    =   $this->input->post('id_event');
        
        if(empty($eventID))
        {
            if($this->input->post('event_name') != '' AND $this->input->post('event_date') != '')
            {
                $user = $this->connect->get_current_user();

                $datetime  = ($this->input->post('event_date')) ? getMysqlDatetime($this->input->post('event_date')) : '0000-00-00';

                $data   =   array(
                    'name'      =>  $this->input->post('event_name'),
                    'datetime'  =>  $datetime,
                    'author'    =>  $user['screen_name'],
                    'created'   =>  date('Y-m-d H:i:s')
                );

                $eventID    =   $this->eventcalendar->saveEvent($data);

                foreach(Settings::get_languages() as $l){
                    $dataLang   =   array(
                        'id_event'      =>  $eventID,
                        'lang'          =>  $l['lang'],
                        'title'         =>  $this->input->post('event_title_'.$l['lang']),
                        'subtitle'      =>  $this->input->post('event_subtitle_'.$l['lang']),
                        'description'   =>  $this->input->post('event_description_'.$l['lang'])
                    );

                    $this->eventcalendar->saveEventLang($dataLang);
                }

                $this->callback = array(
                    array(
                         'fn' => 'ION.updateElement',
                         'args' => array(
                          'element'=> 'mainPanel',
                          'url' => site_url(admin_url().'module/eventcalendar/eventcalendar/index')
                         )
                        ),
                    array(
                         'fn' => 'ION.notification',
                         'args' => array('success', lang('module_eventcalendar_event_added'))
                        )
                    );
                $this->response();
            }
            else
            {
                $this->callback[] = array
                (
                    'fn' => 'ION.notification',
                    'args' => array('error', lang('module_eventcalendar_event_nadded'))
                );
                $this->response();
            }
        }
        else
        {
            if($this->input->post('event_name') != '' AND $this->input->post('event_date') != '')
            {
                $user = $this->connect->get_current_user();

                $datetime  = ($this->input->post('event_date')) ? getMysqlDatetime($this->input->post('event_date')) : '0000-00-00';
                
                $data   =   array(
                    'name'      =>  $this->input->post('event_name'),
                    'datetime'  =>  $datetime,
                    'updater'   =>  $user['screen_name'],
                    'updated'   =>  date('Y-m-d H:i:s')
                );
                
                $this->eventcalendar->updateEvent($eventID, $data);
                
                foreach(Settings::get_languages() as $l){
                    $dataLang   =   array(
                        'title'         =>  $this->input->post('event_title_'.$l['lang']),
                        'subtitle'      =>  $this->input->post('event_subtitle_'.$l['lang']),
                        'description'   =>  $this->input->post('event_description_'.$l['lang'])
                    );
                    
                    $this->eventcalendar->updateEventLang($eventID,$l['lang'],$dataLang);
                }
                
                $this->callback = array(
                    array(
                         'fn' => 'ION.updateElement',
                         'args' => array(
                          'element'=> 'mainPanel',
                          'url' => site_url(admin_url().'module/eventcalendar/eventcalendar/index')
                         )
                        ),
                    array(
                         'fn' => 'ION.notification',
                         'args' => array('success', lang('module_eventcalendar_event_added'))
                        )
                    );
                $this->response();
            }
            
            else
            {

                $this->callback[] = array
                (
                    'fn' => 'ION.notification',
                    'args' => array('error', lang('module_eventcalendar_event_nadded'))
                );
                $this->response();
            }
        }
    }
    
    function update($eventID)
    {
        $this->eventcalendar->feed_template($eventID, $this->template);
        $this->eventcalendar->feed_lang_template($eventID, $this->template);
        
        $this->template['event']   =   $this->eventcalendar->getEvent($eventID);
        
        $this->output('admin/edit');
    }
    
    function xhr_delete()
    {
        $eventID = $this->input->post('id');

        if ($eventID)
        {
            if ($eventID != '')
            {
                $this->eventcalendar->deleteEvent($eventID);
                
                $addon_data = array(
                        'id' =>	$eventID
                );

                $this->success(lang('module_eventcalendar_event_deleted'), $addon_data);
            }
            else
            {
                $this->error(lang('module_eventcalendar_event_vdeleted'));
            }
        }
        else
        {
            $this->error(lang('module_eventcalendar_event_vdeleted'));
        }
    }
}