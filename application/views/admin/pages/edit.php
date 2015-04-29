<link rel="stylesheet" href="/assets/uikit-2.16.2/css/components/upload.min.css">
<link rel="stylesheet" href="/assets/uikit-2.16.2/css/components/form-file.min.css">
<link rel="stylesheet" href="/assets/uikit-2.16.2/css/components/placeholder.min.css">
<link rel="stylesheet" href="/assets/uikit-2.16.2/css/components/upload.gradient.min.css">
<script src="/assets/uikit-2.16.2/js/components/upload.min.js"></script>
<script src="/assets/uikit-2.16.2/js/components/autocomplete.min.js"></script>
<script src="/assets/js/back.pages.js"></script>
<link rel="stylesheet" href="/assets/uikit-2.16.2/css/components/autocomplete.min.css" />
<?php
$this->load->view('admin/tinymce/tiny');
?>

<div class="uk-width-1-1 uk-margin-top">
<?php
echo form_open('',array('class'=>'uk-form uk-form-stacked')); 
?>
<fieldset>
<legend>edytuj stronę</legend>

<div class="uk-form-row">
<label class="uk-form-label">tytuł</label>
<?php
$data=array(
    'name'=>'title',
    'value' => $page->title
);
echo form_input($data);
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">opis dla przeglądarki</label>
<?php
$data=array(
    'name'=>'desc',
);
echo form_input($data,set_value('desc',$page->desc,false)); 
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
echo form_textarea($data,set_value('body',$page->body,false)); 
?>
</div>

<div class="uk-form-row">
<label class="uk-form-label">typ</label>
<div class="uk-autocomplete uk-form uk-margin-bottom" data-uk-autocomplete="{source:'/ajax/pages_autocomplete_type'}">
<input type="text" name="type" value="<?php echo set_value('type',$page->type);?>">
<span class="uk-form-help-inline">zacznij wpisywać typ,jeśli jakiś istnieje, wyświetli się do wyboru, sugerowane np str_glowna, strona albo post</span>
</div>

<div class="uk-form-row">
<?php
echo form_submit(array('name'=>'submit','class'=>'uk-button uk-margin uk-button-primary'), 'zapisz'); 
echo form_close(); 
?>
<?php
$this->load->view('admin/my-mediamanager/index');
?>
</div>
</div>
