<div class="uk-width-1-1">
<h2>obrazki</h2>
<a class="uk-button uk-button-primary" href="/admin/pictures/add">dodaj obrazek</a>
<?php
if (count($pictures)==0) {
  echo '<p>brak obrazków';

} else {
$tmpl = array ( 'table_open'  => '<table class="uk-table uk-table-striped">' );
$this->table->set_template($tmpl); 
$this->table->set_heading('id', 'nazwa','alt','akcje');
foreach ($pictures as $value) {
  $cell1=$value->id;
  $cell3='<img src="/upload/small/'.$value->name.'"/><br/>'.$value->name;
  $cell4=$value->alt;
  $cell6='<a class="uk-button uk-button-primary" href="/admin/pictures/edit/'.$value->id.'">edytuj</a>';
  $cell7='<a class="uk-button" href="/admin/pictures/delete/'.$value->id.'">skasuj</a>';
  $this->table->add_row($cell1,$cell3,$cell4,$cell6.$cell7);

}
echo $this->table->generate();
echo $this->pagination->create_links();
}
?>
