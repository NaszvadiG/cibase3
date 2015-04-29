<div class="uk-width-1-4 uk-container-center uk-margin-large-top">
<?php
echo form_open('',array('class'=>'uk-form uk-form-stacked'));
?>
<div class="uk-form-row">
<div class="uk-form-icon">
<i class="uk-icon-user"></i>
<?php
$data = array(
    'name' => 'login',
    'class' => 'uk-form-large uk-text-center'
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
    'class' => 'uk-form-large uk-text-center'
);
echo form_password($data);
?>
</div>
</div>
<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
<?php echo form_close(); ?>
</div>
