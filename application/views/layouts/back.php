<!doctype html>
<html class="no-js" lang="pl">
    <head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $template['title']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/uikit.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/components/upload.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/<?=DATATABLES_VERSION;?>/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/components/form-file.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/components/placeholder.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/components/upload.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/css/components/autocomplete.min.css" />
                <?php echo $template['metadata']; ?>
    </head>
    <body>

<?php
if ($this->session->userdata('loggedin')==1) {
?>
<nav class="uk-navbar uk-navbar-attached" style="padding:1em 0;">
<div class="uk-container uk-container-center">
<a href="/admin/pages" class="uk-navbar-brand"><img src="/assets/img/zapleczko.svg" alt="zapleczko logo"/></a>
    <ul class="uk-navbar-nav ">
        <li><a href="/admin/pages">strony</a></li>
        <li><a href="/admin/menus">menu</a></li>
        <li><a href="/admin/pictures">obrazki</a></li>
        <li><a href="/admin/galleries">galerie</a></li>
        <li><a href="/admin/users">użytkownicy</a></li>
        <li><a href="/admin/logout">wyloguj się</a></li>
    </ul>
</div>
</nav>
<?php
}
?>

<div class="uk-container uk-container-center uk-margin-top">
<?php
if ($message){
    echo '<div class="uk-width-1-1 uk-margin">';
    echo '<div class="uk-alert">';
    echo '<a href="" class="uk-alert-close uk-close"></a>';
    echo $message;
    echo '</div>';
    echo '</div>';
}
?>

<?php
echo $template['body'];
?>

<footer class="uk-margin uk-margin-large-top uk-text-center">
<hr/>
<p>
<?php
echo 'Wersje php na serwerze:'.PHP_VERSION;
?>
    . Strona zrenderowana w {elapsed_time} sekund. Zużycie pamięci {memory_usage}. UIkit <?=UIKIT_VERSION;?> 
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/<?=JQUERY_VERSION;?>/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/js/uikit.min.js"></script>
<script src="//cdn.datatables.net/<?=DATATABLES_VERSION;?>/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/js/components/upload.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/<?=UIKIT_VERSION;?>/js/components/autocomplete.min.js"></script>
<script src="//tinymce.cachefly.net/<?=TINYMCE_VERSION;?>/tinymce.min.js"></script>
<script src="/assets/js/pages.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
//(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
//function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
//e=o.createElement(i);r=o.getElementsByTagName(i)[0];
//e.src='https://www.google-analytics.com/analytics.js';
//r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
//ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
