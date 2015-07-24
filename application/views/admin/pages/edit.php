<div class="uk-width-1-1 uk-margin-top">
<?php
echo validation_errors();
echo form_open('',array('class'=>'uk-form uk-form-stacked'));
?>
<fieldset>
<legend>edytuj stronę</legend>

<div class="uk-form-row">
<label class="uk-form-label">tytuł</label>
<div class="uk-form-controls">
<?php
$data=array(
    'name'=>'title',
    'value' => set_value('title',$page->title)
);
echo form_input($data);
?>
</div>
</div>

<div class="uk-form-row">
<label class="uk-form-label">opis dla przeglądarki</label>
<div class="uk-form-controls">
<?php
$data=array(
  'name'=>'desc',
  'value' => set_value('desc',$page->desc)
);
echo form_input($data);
?>
</div>
</div>

<div class="uk-form-row">
<a href="#mediamanager" id="mediamanager__button" class="uk-button uk-button-success" data-uk-modal>DODAJ MEDIA</a>
</div>

<div class="uk-form-row">
<label class="uk-form-label">treść</label>
<div class="uk-form-controls">
<?php
$data = array(
  'name' => 'body',
  'value' => set_value('body',$page->body,FALSE),
);
echo form_textarea($data);
?>
</div>
</div>

<div class="uk-form-row">
<label class="uk-form-label">typ</label>
<div class="uk-form-controls">
<div class="uk-autocomplete uk-margin-bottom" data-uk-autocomplete="{source:'/admin/pages/autocomplete'}">
<input type="text" name="type" value="<?php echo set_value('type',$page->type);?>">
<span class="uk-form-help-inline">typ strony: str_glowna, strona</span>
</div>
</div>
</div>

<div class="uk-form-row">
<div class="uk-form-controls">
<button type="submit" class="uk-button uk-button-primary">zapisz</button>
</div>
</div>

</fieldset>
<?php
echo form_close();
?>
</div>
