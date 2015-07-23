<!doctype html>
<html class="no-js" lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/uikit.min.css">
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/upload.min.css">
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/form-file.min.css">
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/placeholder.min.css">
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/upload.min.css">
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/autocomplete.min.css" />
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/nestable.min.css" />
<link rel="stylesheet" href="/assets/uikit-<?=UIKIT_VERSION;?>/css/components/datepicker.min.css" />
    </head>
    <body>

<?php
if ($this->ion_auth->logged_in()) {
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
