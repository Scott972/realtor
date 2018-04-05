<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 5:53 PM
 */


class State_lib{

    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('state');
    }


    /**
     * @return state
     * returns a list of all states
     */
    public function get()
    {
        return $this->ci->state->get();
    }
}