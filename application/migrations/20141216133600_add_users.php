<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_users extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'email' => array(
                'type' => 'VARCHAR',
                'default' => 0,
                'constraint' => '120',
                'null' => false
            ),
            'hash' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => false
            )
        ));
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
