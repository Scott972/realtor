<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 6:15 PM
 */

$config = array(

    'request' => array(
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|required|min_length[1]|max_length[100]'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'trim|required|min_length[1]|max_length[100]'),
        array('field' => 'email', 'label' => 'email', 'rules' => 'trim|required|max_length[100]|valid_email'),
        array('field' => 'address', 'label' => 'Address', 'rules' => 'trim|required|min_length[1]|max_length[100]'),
        array('field' => 'city', 'label' => 'City', 'rules' => 'trim|required|min_length[1]|max_length[100]'),
        array('field' => 'postal_code', 'label' => 'Zip / Postal Code', 'rules' => 'trim|required|min_length[3]|max_length[10]'),
        array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required'),
        array('field' => 'budget', 'label' => 'Maximum Budget', 'rules' => 'trim|required|numeric'),
        array('field' => 'captcha', 'rules' => 'trim|required'),


    )
);