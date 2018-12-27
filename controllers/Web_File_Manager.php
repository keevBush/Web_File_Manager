<?php

/**
 * Web File Manager controller.
 *
 * @category   Apps
 * @package    Web_File_Manager
 * @subpackage Views
 * @author     Your name <your@e-mail>
 * @copyright  2013 Your name / Company
 * @license    Your license
 */

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////
use clearos\apps\Web_File_Manager\Elfinder as Elfinder;

/**
 * Web File Manager controller.
 *
 * @category   Apps
 * @package    Web_File_Manager
 * @subpackage Controllers
 * @author     Your name <your@e-mail>
 * @copyright  2013 Your name / Company
 * @license    Your license
 */

class Web_File_Manager extends ClearOS_Controller
{
    /**
     * Web File Manager default controller.
     *
     * @return view
     */

    function __construct()
    {
       parent::__construct();         
       //$this->load->library('Web_File_Manager/Elfinder');
       $this->load->library('Web_File_Manager/Item');

    }
    function index()
    {
        $this->load->library('Web_File_Manager/Elfinder');

        // Load dependencies
        //------------------

        $this->lang->load('Web_File_Manager');
        // Load views
        //-----------
        $this->page->view_form('Web_File_Manager', NULL, lang('Web_File_Manager_app_name'));
    }

    public function assets(){
        $this->load->helper('file');  
        $file = str_replace("Web_File_Manager/assets/","",uri_string());
        if (is_file(realpath(__DIR__."/../views/".$file))) {
            header("Content-type: ".get_mime_by_extension($file));
            $this->load->view($file);            
        }else{
            show_404();
        }
    }
 
    public function execute(){
        
        $this->load->library('Web_File_Manager/Elfinder');
        
        $elfinder = new Elfinder();
        $cmd = $this->input->get('cmd');
        echo json_encode ($elfinder->$cmd( $this->input->get('parmetre')));
    }
}
