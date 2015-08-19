<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_menus extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(
            array(
                'name' => array(
                    'type' => 'text', 
                    'null' => false
                ),
                'url' => array(
                    'type' => 'text', 
                    'null' => false
                ),
                'position' => array(
                    'type' => 'int', 
                    'null' => false
                ),
                'parent_id' => array(
                    'type' => 'int', 
                    'null' => false
                ),
            )
        );
        $this->dbforge->create_table('menus');
    }

    public function down()
    {
        $this->dbforge->drop_table('menus');
    }
}
