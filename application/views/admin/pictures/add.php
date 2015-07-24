<div class="uk-width-1-1">
<?php
echo form_open_multipart('',array('class'=>'uk-form uk-form-stacked'));
?>
<fieldset>
<legend>dodaj obrazek</legend>
<div class="uk-form-row">
<label class="uk-form-label">dodaj obrazek z dysku</label>
<?php
$data=array('name'=>'userfile');
echo form_upload($data);
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">opis obrazka</label>
<?php
$data = array(
            'name' => 'alt',
            'value' => set_value('alt')
        );
echo form_input($data);
?>
</div>

<div class="uk-form-row">
<?php
$data=array(
			'value'=>'ładuj',
			'class'=>'uk-button uk-button-primary'
);
echo form_submit($data);
?>
</fieldset>
<?php echo form_close(); ?>
</div>
