<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sitemap Module Model
 *
 * @author		UKYO - ALTI VE BIR BILISIM TEKNOLOJILERI || http://www.6ve1.com
 *
 */

class Sitemap_model extends Base_model 
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
	
        public function getPages()
	{
		$lang	=   Settings::get_lang();
                
                            $this->db->where(array('online' => 1, 'appears' => 1, 'id_parent' => 0));
                            $this->db->order_by('ordering', 'DESC');
		$pages	=   $this->db->get('page');
		
		$tree   =   '';

		foreach($pages->result_array() as $page)
		{
                                        $this->db->where(array('id_page' => $page['id_page'], 'lang' => $lang));
                        $pageLang   =   $this->db->get_where('page_lang');
                        $pageL      =   $pageLang->row_array();
                        $url        =   base_url().$lang.'/';
                            
                        $tree .= "<li>";
                        
                            $tree .= "<a href=\"" . $url . $pageL['url'] . "\">".$pageL['title']."</a>";

                            if($page['id_parent'] !=  0 || $page['id_parent'] == '0')
                                $tree    .=  $this->getSubPages($page['id_page']);

                        $tree .= "</li>\n";
                        
		}
		
		$tree   .=   '';
		
		return $tree;
        }

        public function getSubPages($PARENT)
        {
                $lang	=   Settings::get_lang();
                
                            $this->db->where('id_parent', $PARENT);
		$pages	=   $this->db->get('page');
                $url        =   base_url().$lang.'/';

                if($pages->num_rows() > 0)
                {
                    $tree   =   '<ul>';
                    foreach ($pages->result_array() as $page)
                    {
                                            $this->db->where(array('id_page' => $page['id_page'], 'lang' => $lang));
                            $pageLang   =   $this->db->get_where('page_lang');
                            $pageL      =   $pageLang->row_array();

                            $tree .= "<li>";
                                $tree .= "<a href=\"" . $url . $pageL['url'] . "\">".$pageL['title']."</a>";
                                if($page['level'] >= 1)
                                    $tree .= $this->getSubPages($page['id_page']);
                            $tree .= "</li>\n";

                    }
                    $tree   .=  "</ul>\n";

                    return $tree;
                }
        }
}