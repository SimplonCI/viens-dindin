<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/material.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Viens dindin</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="android-header mdl-layout__header " style="z-index:1;">
    <div class="mdl-layout__header-row">
        <span class="android-title mdl-layout-title">
        <img class="android-logo-image" src="assets/images/android-logo.png">
        </span>
        <!-- Add spacer, to align navigation to the right in desktop -->
        <div class="android-header-spacer mdl-layout-spacer"></div>
        <div class="android-search-box ">

        <form action="" method="post" name="searchfrom">
        
            <!-- <div class="input-icon-wrap">
                <span class="input-icon"><span class="fa fa-user"></span></span>
                <input type="text" class="input-with-icon" id="form-name">
            </div>  	 -->

                
        </form>
        </div>
        <!-- Navigation -->
        <div class="android-navigation-container">
        <nav class="android-navigation mdl-navigation">
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Phones</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Tablets</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Wear</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">TV</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Auto</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">One</a>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Play</a>
        </nav>
        </div>
        <span class="android-mobile-title mdl-layout-title">
        <img class="android-logo-image" src="assets/images/android-logo.png">
        </span>
        <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
        <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
        <li class="mdl-menu__item">5.0 Lollipop</li>
        <li class="mdl-menu__item">4.4 KitKat</li>
        <li disabled class="mdl-menu__item">4.3 Jelly Bean</li>
        <li class="mdl-menu__item">Android History</li>
        </ul>

        <button class="android-more-button  mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Button
        </button>
    </div>
    </div>

    <div class="android-drawer mdl-layout__drawer " style="z-index:0;visibility: visible;">
        <span class="mdl-layout-title">
            <img class="android-logo-image" src="assets/images/android-logo-white.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Phones</a>
            <a class="mdl-navigation__link" href="">Tablets</a>
            <a class="mdl-navigation__link" href="">Wear</a>
            <a class="mdl-navigation__link" href="">TV</a>
            <a class="mdl-navigation__link" href="">Auto</a>
            <a class="mdl-navigation__link" href="">One</a>
            <a class="mdl-navigation__link" href="">Play</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Versions</span>
            <a class="mdl-navigation__link" href="">Lollipop 5.0</a>
            <a class="mdl-navigation__link" href="">KitKat 4.4</a>
            <a class="mdl-navigation__link" href="">Jelly Bean 4.3</a>
            <a class="mdl-navigation__link" href="">Android history</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Resources</span>
            <a class="mdl-navigation__link" href="">Official blog</a>
            <a class="mdl-navigation__link" href="">Android on Google+</a>
            <a class="mdl-navigation__link" href="">Android on Twitter</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">For developers</span>
            <a class="mdl-navigation__link" href="">App developer resources</a>
            <a class="mdl-navigation__link" href="">Android Open Source Project</a>
            <a class="mdl-navigation__link" href="">Android SDK</a>
        </nav>
    </div>

    <main class="mdl-layout__content">
        <div class="page-content">
        <div class="demo-card-image mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">Image.jpg</span>
            </div>
        </div>
        </div>
    </main>
   
</div>

<style>
.demo-card-image.mdl-card {
  width: 256px;
  height: 256px;
  background: url('https://getmdl.io/assets/demos/image_card.jpg') center / cover;
}
.demo-card-image > .mdl-card__actions {
  height: 52px;
  padding: 16px;
  background: rgba(0, 0, 0, 0.2);
}
.demo-card-image__filename {
  color: #fff;
  font-size: 14px;
  font-weight: 500;
}
</style>


<script src="assets/js/material.js"></script>
</body>
</html>