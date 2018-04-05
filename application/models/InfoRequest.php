<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 8:45 PM
 */

/**
 * Class InfoRequest
 *
 * Handles all interaction with info_request
 */
class InfoRequest extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param null $id
     * @return InfoRequest
     * 
     * Returns a single request by ID or entire table
     */
    public function get($id = null)
    {
        if(! is_null($id)){
            $this->db->where('id', $id);
            return $this->db->get('info_request')->row();
        }

        return $this->db->get('info_request')->result(); 
    }

    /**
     * @param $infoRequest
     * @return bool
     * 
     * INSERTS a new row into info_request
     */
    public function insert($infoRequest)
    {
        $this->db->set($infoRequest);
        return $this->db->insert('info_request');
    }
}