<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 5:48 PM
 */

class State extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @return State
     * 
     * Returns contents of states
     */
    public function get()
    {
        return $this->db->get('states')->result();
    }
}