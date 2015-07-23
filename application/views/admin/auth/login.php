<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php 
$data = array(
    'class' => 'uk-form uk-form-stacked',
    );
echo form_open("admin/auth/login", $data);
?>

<div class="uk-form-row">
    <div class="uk-form-label">
    <?php echo lang('login_identity_label', 'identity');?>
    </div>
    <div class="uk-form-controls">
    <?php echo form_input($identity);?>
    </div>
</div>

<div class="uk-form-row">
    <div class="uk-form-label">
    <?php echo lang('login_password_label', 'password');?>
    </div>
    <div class="uk-form-controls">
    <?php echo form_input($password);?>
    </div>
</div>

<div class="uk-form-row">
<div class="uk-form-controls">
<label>
    <?php echo lang('login_remember_label', 'remember');?>
</label>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
</div>
</div>

<div class="uk-form-row">
<div class="uk-form-controls">
<button type=submit class="uk-button uk-button-primary"><?php echo lang('login_submit_btn');?></button>
</div>
</div>
<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
