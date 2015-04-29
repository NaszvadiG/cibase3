<?php
$this->load->view('admin/pages/scripts');
?>
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-overflow-container">
<h2>strony</h2>
<a class="uk-button uk-button-primary uk-margin" href="<?php echo base_url();?>admin/pages/add">dodaj stronę</a>
<?php
$tmpl = array ( 'table_open'  => '<table class="uk-table uk-table-striped uk-table-hover"><caption>lista stron do edycji</caption>' );

$this->table->set_template($tmpl); 
$this->table->set_heading('tytuł','slug','opis','typ','akcje');
foreach ($pages as $value) {
  $cell1=$value->title;
  $cell1a=$value->slug;
  $cell2=$value->desc;
  $cell3=$value->type;
  $cell5='<a class="uk-button uk-button-primary" href="'.base_url().'admin/pages/edit/'.$value->id.'">edytuj</a>';
  $cell6='<a class="uk-button" href="'.base_url().'admin/pages/delete/'.$value->id.'">skasuj</a>';
  $this->table->add_row($cell1,$cell1a,$cell2,$cell3,$cell5.$cell6);

}
echo $this->table->generate();

?>
</div>
</div>
