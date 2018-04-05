<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 4:05 PM
 */

class Property extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @return array
     * Simulates getting properties from service, database, etc
     */
    public function get()
    {
        return array(1,2,3);
    }
}