<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sessions extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'default' => 0,
                'constraint' => 40,
                'null' => false
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'default' => 0,
                'constraint' => '45',
                'null' => false
            ),
            'timestamp' => array(
                'type' => 'int',
                'default' => 0,
                'constraint' => '10',
                'null' => false
            ), 
            'data' => array(
                'type' => 'blob',
                'null' => false
            )
        ));
        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->add_key('timestamp');
        $this->dbforge->create_table('ci_sessions');
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}
