<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_form extends Base_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		require_once APPPATH.'libraries/ftl/parser.php';
		require_once APPPATH.'libraries/ftl/arraycontext.php';
		require_once APPPATH.'libraries/Tagmanager.php';
		require_once APPPATH.'libraries/Tagmanager/Form.php';
		$this->context = new FTL_ArrayContext();
		$f = new TagManager_Form($this);
		$f->add_globals($this->context);
		$f->add_tags($this->context);
	}

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first_name', lang('module_contact_form_first_name'), 'trim|required|min_length[4]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('last_name', lang('module_contact_form_last_name'), 'trim|required|min_length[4]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('email', lang('module_contact_form_email'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('subject', lang('module_contact_form_subject'), 'trim|required|min_length[12]|max_length[55]|xss_clean');
		$this->form_validation->set_rules('message', lang('module_contact_form_message'), 'trim|required|min_length[30]|max_length[500]|xss_clean');
		
		$this->form_validation->set_message('required', '%s '.lang('module_contact_form_required'));
		$this->form_validation->set_message('min_length', '%s '.lang('module_contact_form_min_length'));
		$this->form_validation->set_message('max_length', '%s '.lang('module_contact_form_max_length'));
		$this->form_validation->set_message('valid_email', '%s '.lang('module_contact_form_valid_e_mail'));
		
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('validation_errors', $this->form_validation->error_string());
			$this->session->set_flashdata('field_data', $this->form_validation->_field_data);
				
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		else
		{
			$date_time	=	date('Y-m-d H:i:s');
			
			$data	=	array(
				'first_name'	=>	$this->input->post('first_name'),
				'last_name'		=>	$this->input->post('last_name'),
				'email'			=>	$this->input->post('email'),
				'sendmeacopy'	=>	$this->input->post('sendmeacopy'),
				'subject'		=>	$this->input->post('subject'),
				'message'		=>	$this->input->post('message'),
				'date_time'		=>	$date_time
			);
			
			$this->_send($data);
			// Redirect to the success message page
			$this->output('contact_success');
		}
	}
	
	function _send($data)
	{
		$this->load->library('email');

		$config['protocol'] = 'mail';
		$config['mailtype'] = 'html';

		/*
		* Eğer protocol'ü smtp olarak belirlediyseniz alttaki gerekli ayarlary yapmalysynyz.
		* If you set protocol smtp, you must make required settings.
		*
		* $config['smtp_host'] = 'smtp_sunucusu';
		* $config['smtp_user'] = 'smtp_kullanici_adi';
		* $config['smtp_pass'] = 'smtp_sifresi';
		* $config['smtp_port'] = smtp_portu;
		*
		* Belirledi?imiz ayarlarla e-posta gönderimine ba?lyyoruz.
		* We are starting to send email.
		*/

		$this->email->initialize($config);

		$this->email->from($data['email'], ' | '. lang('module_contact_form_site_name'));

		$this->email->to(config_item('email_to')); 

			if(!empty($data['sendmeacopy'])){ $mail	=	$data['email']; } else { $mail	=	''; }

		$this->email->cc($mail);

		$this->email->subject($data['subject']);

		$this->email->message($this->load->view('contact_template', $data, TRUE));

		if($this->email->send()) {
			return TRUE;
		} else {
			return FALSE;
		}

		$this->email->send();

	}
}