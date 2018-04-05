<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 4:44 PM
 */


class Captcha_lib{

    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('captcha');
    }

    /**
     * @return string
     * creates captcha by using GD to write an image to the fs
     */
    public function create()
    {
        $captchaConfig = array(
            'word'          => '', //random letters will be used
            'img_path'      => BASEPATH .'../captchas/', //image created stored here
            'img_url'       => base_url().'captchas/', //public locaton of image
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200, //time until image expires
            'word_length'   => 4,
            'font_size'     => 16,
            'img_id'        => 'Imageid', //attribute
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', //used to make word
            
        );

        return create_captcha($captchaConfig);

    }

    /**
     * @param $captcha
     * @return bool
     * Checks user entered value of captcha against stored value in session
     */
    public function validateCaptcha($captcha)
    {
        return $captcha == $this->ci->session->userdata('captcha_word');
    }
}