<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_galleries extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'created_at' => array(
                'type' => 'datetime', 
                'default' => 0,
            ),
            'updated_at' => array(
                'type' => 'datetime', 
                'default' => 0,
            ),
            'name' => array(
                'type' => 'text',
                'null' => false
            ),
            'slug' => array(
                'type' => 'text', 
                'null' => false
            ),
            'desc' => array(
                'type' => 'text', 
                'null' => false
            ) 
        ));
        $this->dbforge->create_table('galleries');


    }

    public function down()
    {
        $this->dbforge->drop_table('galleries');
    }
}
