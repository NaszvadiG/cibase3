<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_menus extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'parent_id' => array(
                'type' => 'int',
                'default' => 0,
                'null' => false
            ),
            'menu' => array(
                'type' => 'text', 
                'null' => false
            ),

            'label' => array(
                'type' => 'text',
                'null' => false
            ),
            'uri' => array(
                'type' => 'text', 
                'null' => false
            ),
            'attributes' => array(
                'type' => 'text', 
                'null' => false
            ),
            'sequence' => array(
                'type' => 'int', 
                'default' => 0,
                'null' => false
            )
        ));
        $this->dbforge->create_table('menus');


    }

    public function down()
    {
        $this->dbforge->drop_table('menus');
    }
}
