<ul class="gallery__grid uk-grid uk-grid-width-medium-1-6 uk-grid-width-small-1-3" data-uk-grid="{gutter: 20}">
<?php
foreach ($pictures as $value) {
    echo '<li class="gallery__item">
    <div class="uk-overlay uk-overlay-hover">
    <img class="gallery__thumb" src="'.base_url().'upload/small/'.$value->name.'" alt="'.$value->alt.'"/>
    <div class="uk-overlay-panel uk-overlay-fade uk-overlay-icon"></div>
<a class="uk-position-cover" href="/upload/'.$value->name.'" data-uk-lightbox="{group: \'galeria\'}"></a>
        </div>
    </li>';
}
?>
</ul>
<p>Pisz dalej
