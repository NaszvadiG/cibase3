<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_pages extends CI_Migration {

    public function up()
    {

        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
                'created_at' => array(
                'type' => 'datetime',
                'default' => 0,
                'null' => false
            ),
            'updated_at' => array(
                'type' => 'datetime',
                'default' => 0,
                'null' => false
            ),
            'title' => array(
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
            ),
            'body' => array(
                'type' => 'text', 
                'null' => false
            ),
            'type' => array(
                'type' => 'text', 
                'null' => false
            )
        ));
        $this->dbforge->create_table('pages');
    }

    public function down()
    {
        $this->dbforge->drop_table('pages');
    }
}
