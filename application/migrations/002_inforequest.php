<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 4/3/2018
 * Time: 7:33 PM
 */

class Migration_Inforequest extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null' => false,
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ),
            'address_2' => array(
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ),
            'city' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null' => false,
            ),
            'state' => array(
                'type' => 'VARCHAR',
                'constraint' => 4,
                'null' => false,
            ),
            'postal_code' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ),
            'referral' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ),
            'budget' => array(
                'type' => 'INT',
                'constraint' => 10,
                'null' => false,
            ),
            'property_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'null' => false,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('info_request');
    }

    public function down()
    {
        $this->dbforge->drop_table('info_request');
    }
}