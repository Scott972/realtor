<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 10:02 PM
 */

/**
 * Class Admin
 */
class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('infoRequest');
        $this->load->library('table');
        $this->load->library('ion_auth');

        /**
         * Dont want any user that's not logged in here
         */
        if(!$this->ion_auth->logged_in()){
            redirect('/admin/authenticate/login', 'refresh');
        }
    }

    /**
     * Allows admin to view all requests submitted
     */
    public function index()
    {
        $data['requests'] = $this->infoRequest->get();

        $this->load->view('includes/header', array('admin' => true));//to display logout option
        $this->load->view('admin/dashboard', $data);
        $this->load->view('includes/footer');
    }

    
    public function notifications()
    {
       /**render view**/
    }
    
    
    public function ajax_get_notify()
    {
        /**disallow access via url**/
        if(! $this->input->is_ajax_request()){
            redirect('/admin/dashboard/notifications', 'refresh');
        }
        /**query of list of people who currently want to be notified**/
        /** return json encoded string */
    }
    
    /**
     * @param int $version
     *  Used to make increase or decrease db version
     */
    private function migrate($version)
    {
        $this->load->library('migration');
        $this->migration->version($version);
    }
}