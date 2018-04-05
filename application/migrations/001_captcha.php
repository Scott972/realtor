<?php

/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 4:23 PM
 */
class Migration_Captcha extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'captcha_id' => array(
                'type' => 'BIGINT',
                'constraint' => 13,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'captcha_time' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => false,
            ),
            'word' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ),
        ));
        $this->dbforge->add_key('captcha_id', TRUE);
        $this->dbforge->add_key('word');
        $this->dbforge->create_table('captcha');
    }

    public function down()
    {
        $this->dbforge->drop_table('captcha');
    }

}