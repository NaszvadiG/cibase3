<?php
$this->load->view('admin/pages/scripts');
?>
<div class="uk-width-1-1 uk-margin-top">
<?php
echo form_open('',array('class'=>'uk-form uk-form-stacked')); 
echo validation_errors();
?>
<fieldset>
<legend>dodaj stronę</legend>

<div class="uk-form-row">
<label class="uk-form-label">tytuł</label>
<?php
$data=array(
    'name'=>'title',
);
echo form_input($data,set_value('title'));
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">opis dla przeglądarki</label>
<?php
$data=array(
  'name'=>'desc'
);
echo form_input($data, set_value('desc')); 
?>
</div>


<div class="uk-form-row">
<a href="#my-mediamanager" class="uk-button uk-button-success" data-uk-modal>DODAJ MEDIA</a>
</div>

<div class="uk-form-row">
<label class="uk-form-label">treść</label>
<?php
$data = array(
  'name' => 'body',
);
echo form_textarea($data, set_value('body','',FALSE)); 
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">typ</label>
<div class="uk-autocomplete uk-form uk-margin-bottom" data-uk-autocomplete="{source:'/admin/ajax/pages_autocomplete_type'}">
<input type="text" name="type" value="<?php echo set_value('type');?>">
<span class="uk-form-help-inline">zacznij wpisywać typ,jeśli jakiś istnieje, wyświetli się do wyboru, sugerowane np str_glowna, strona albo post</span>
</div>

<div class="uk-form-row">
<?php
echo form_submit(array('name'=>'submit','class'=>'uk-button uk-margin uk-button-primary'), 'zapisz'); 
echo form_close(); 
?>
</div>
</div>

