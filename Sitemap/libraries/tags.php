<?php
/**
 * Sitemap Module Tag Manager
 *
 * @author		UKYO - ALTI VE BIR BILISIM TEKNOLOJILERI || http://www.6ve1.com
 *
 */

class Sitemap_Tags
{
    function __construct()
    {
        $ci =  &get_instance();

            $ci->load->model('sitemap_model');
    }

    /**
     * @usage	<ion:sitemap >
     *			...
     *		</ion:sitemap>
     */
    public static function index(FTL_Binding $tag)
    {
        $str = $tag->expand();

        return $str;
    }

    /*
    * @usage	<ion:pages />
    */
    public static function tree(FTL_Binding $tag)
    {
        $ci     =   &get_instance();
        $ci->load->model('sitemap_model');

        $tree    =   $ci->sitemap_model->getPages();

        return $tree;
    }
}
