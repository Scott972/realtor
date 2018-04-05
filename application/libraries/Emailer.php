<?php

/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 9:26 PM
 */
class Emailer
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();

        $this->ci->load->library('email');
    }


    /**
     * @param $infoReuest
     * @return bool
     *
     * Sends a new email notification to ''
     */
    public function sendNewInfoRequestNotification($infoReuest)
    {

        $message = "Greetings, a new contact has been added to our database <br />".
                   "First Name: {$infoReuest['first_name']} <br />".
                   "Last Name:  {$infoReuest['last_name']} <br />".
                   "Please visit ".base_url()."admin for more details";

        $this->ci->email->clear();
        $this->ci->email->from('emmanuelscott972@gmail.com');
        $this->ci->email->reply_to('');
        $this->ci->email->to('emmanuelscott972@gmail.com');
        $this->ci->email->subject('The Real Realtors');
        $this->ci->email->message($message);

        if ($this->ci->email->send() == TRUE) {
            return TRUE;
        }
        return FALSE;
    }

}