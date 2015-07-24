<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_pictures extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
                'created_at' => array(
                'type' => 'datetime',
                'default' => 0,
                'null' => false
            ),
            'name' => array(
                'type' => 'text', 
                'null' => false
            ),
            'alt' => array(
                'type' => 'text', 
                'null' => false
            ),
            ));
        $this->dbforge->create_table('pictures');
    }

    public function down()
    {
        $this->dbforge->drop_table('pictures');
    }
}
