<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_default_user extends CI_Migration {

    public function up()
    {
        $email='admin@admin.com';
        $password='password';
        $hash = hash('sha512', $email.$password.$this->config->item('encryption_key') );
        $data = array(
            'email' => $email,
            'hash' => $hash);
        $this->user_model->insert($data);
    }

    public function down()
    {
        $this->user_model->delete_by('email','admin@admin.com');
    }
}
