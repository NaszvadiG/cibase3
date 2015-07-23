<div class="uk-width-1-1">
<?php
echo form_open('',array('class'=>'uk-form uk-form-stacked'));
?>
<fieldset>
<legend>edytuj obrazek</legend>

<div class="uk-form-row">
<label class="uk-form-label">nazwa obrazka</label>
<?php
echo '<img src="/images/small/'.$picture->name.'"/><br/>'.$picture->name;
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">opis</label>
<?php
$data = array(
    'name' => 'alt',
    'value' => set_value('alt',$picture->alt)
);
echo form_input($data);
?>
</div>


<div class="uk-form-row">
<?php
$data=array(
    'value'=>'zapisz',
    'class'=>'uk-button uk-button-primary'
);
echo form_submit($data);
?>
</fieldset>
<?php echo form_close();?>
</div>
