<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 4:42 PM
 */

class Captcha extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /**here we could insert captcha metadata to db
     * to compare after submit, I've opted to use
     * session for this demo
     **/
    public function insert()
    {

    }
}
