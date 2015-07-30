<?php
foreach ($pictures as $value) {
echo '<div class="mediamanager__item"><img data-id="'.$value->id.'" class="mediamanager__thumb" src="/upload/small/'.$value->name.'"></div>';
}
echo $this->pagination->create_links();
?>
