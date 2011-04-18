<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sitemap Module Controller
 *
 * @author		UKYO - ALTI VE BIR BILISIM TEKNOLOJILERI || http://www.6ve1.com
 *
 */


class Sitemap extends Base_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sitemap_model', 'sitemap', true);
    }

    function index()
    {
        $this->template['sitemap']      =   $this->sitemap->getPages();
        $this->sitemap->pagesXmlOutput();
        $this->output('sitemap');
    }

    function user_guide()
    {
        $this->output('user-guide/index');
    }
}