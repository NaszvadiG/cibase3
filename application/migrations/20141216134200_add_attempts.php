<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_attempts extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'int',
                'default' => 0,
                'constraint' => 11,
                'null' => false
            ),
            'attempts' => array(
                'type' => 'int',
                'default' => 0,
                'constraint' => '11',
                'null' => false
            ),
            'datet' => array(
                'type' => 'datetime',
                'null' => false
            ),
            'locked' => array(
                'type' => 'tinyint',
                'constraint' => '4',
                'null' => false
            )
        ));
        $this->dbforge->create_table('attempts');
    }

    public function down()
    {
        $this->dbforge->drop_table('attempts');
    }
}
