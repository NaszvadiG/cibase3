<div class="uk-width-1-4 uk-container-center uk-margin-large-top uk-block uk-block-muted">
<img src="/assets/img/zapleczko.svg" class="uk-margin-bottom uk-margin-left" alt="zapleczko logo"/>
<div class="uk-container">
<?php
echo form_open('',array('class'=>'uk-form uk-form-stacked'));
?>
<div class="uk-form-row">
<div class="uk-form-icon">
<i class="uk-icon-user"></i>
<?php
$data = array(
    'name' => 'login',
    'class' => 'uk-form-large'
);
echo form_input($data, set_value('login'));
?>
</div>
</div>

<div class="uk-form-row">
<div class="uk-form-icon">
<i class="uk-icon-question"></i>
<?php
$data = array(
    'name' => 'password',
    'class' => 'uk-form-large'
);
echo form_password($data);
?>
</div>
</div>
<div class="uk-form-row">
<button type=submit class="uk-button uk-button-primary">zaloguj się</button>
</div>
<?php echo form_close(); ?>
</div>
</div>
