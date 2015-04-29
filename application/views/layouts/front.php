<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $template['title']; ?></title>
        <?php echo $template['metadata']; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="/assets/uikit-2.18.0/css/uikit.gradient.min.css" />
        <link rel="stylesheet" href="/assets/css/niewinne.css">
        <script src="/assets/js/jquery-1.11.2.min.js"></script>
        <script src="/assets/uikit-2.18.0/js/uikit.min.js"></script>
        <script src="/assets/js/cookie.min.js"></script>
        <script src="/assets/js/main.js"></script>
    </head>
    <body>
<div class="uk-container uk-container-center">
<header>
<div class="uk-grid">
<div class="uk-width-medium-1-2">
    <a href="/" class="uk-hidden-small"><img alt="UIkit" title="UIkit" src="/assets/img/logo-sklep.png"></a>
</div>
<div class="uk-width-medium-1-2 nw-header-address">
<p>ul. Walecznych 61<br/>
pon.&ndash;pt.:10<sup>00</sup>&ndash;19<sup>00</sup><br/>
sob.:10<sup>00</sup>&ndash;16<sup>00</sup> 
</div>
</div>
<div class="uk-text-right">
<a class="nw-cart-button uk-button uk-margin-top" href="/shop/display_cart"><i class="uk-icon-shopping-cart uk-icon-medium"></i> KOSZYK (<span class="nw-cart-total-items"><?=$this->cart->total_items();?></span>)</a>
</div>
<nav class="nw-mainnav">
<?php
echo $menu;
?>
</nav>
</header>
<hr/>
</div>

<div class="uk-container uk-container-center">
<section class="niewinne-content">
<?php
    echo $template['body'];
?>
</section>
</div>
<div class="uk-container uk-container-center uk-margin-top">
<hr/>
<footer><p>Niewinneiwinne.com.pl <?php echo date('Y');?>
</footer>
</div>
           </body>
</html>
