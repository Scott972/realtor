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
class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('infoRequest');
        $this->load->library('table');
    }

    /**
     * Allows admin to view all requests submitted
     */
    public function index()
    {
        $data['requests'] = $this->infoRequest->get();

        $this->load->view('includes/header');
        $this->load->view('admin', $data);
        $this->load->view('includes/footer');
    }
}