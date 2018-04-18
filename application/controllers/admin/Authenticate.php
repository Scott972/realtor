<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/18/2018
 * Time: 3:44 PM
 */

class Authenticate extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
    }


    public function index()
    {
        if ( ! $this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('/admin/authenticate/login', 'refresh');
        }
    }

    /**
     * Logs user in - uses Ben Edmunds Ion Auth
     */
    public function login()
    {

        if ($this->form_validation->run('auth'))
        {
            /**third parameter set to false, not implementing remember me**/
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), false))
            {
                //if the login is successful redirect to the dashboard
                redirect('/admin/dashboard', 'refresh');
            }
            else
            {
                // if the login was un-successful  redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('/admin/authenticate/login', 'refresh');
            }
        }
            // the user is not logging in so display the login page
            $this->load->view('includes/header');
            $this->load->view('admin/login');
            $this->load->view('includes/footer');
    }

    /**
     * Logs user out 
     */
    public function logout()
    {
        // log the user out
        $logout = $this->ion_auth->logout();
        
        redirect('/admin/authenticate/login', 'refresh');
    }


}