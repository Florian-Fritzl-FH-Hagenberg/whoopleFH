<?php
//include auth.php file on all secure pages
include("authentication.php");
//require database for user information
require("database.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Whoople is the easy wasy to connect all your social media accounts">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>whoople</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">

    <link rel="stylesheet" href="styles.css">

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="jquery-3.2.1.js"></script>
    <script src="script_friends.js"></script>
    <script src="script.js"></script>
</head>
<body>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">whoople</span>
            <div class="mdl-layout-spacer"></div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search" id="searchButton">
                    <!--i class="material-icons">search</i-->
                </label>
                <input type="text" name="typeahead" class="mdl-textfield__input typeahead" autocomplete="off"
                       spellcheck="false" placeholder="Search for users...">
                <label class="mdl-textfield__label" for="search"></label>
            </div>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="logout.php">Sign out</a>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/stefan.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown" style="margin-top: 10px;">
                <span><!--?php echo $_SESSION['username']; ?--> Stefan Peyreder</span>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                                role="presentation">home</i>Home</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">inbox</i>Inbox</a>
            <a class="mdl-navigation__link" href="friends.php"><i
                    class="mdl-color-text--blue-grey-400 material-icons mdl-badge mdl-badge--overlap" data-badge="4"
                    role="presentation">sentiment_very_satisfied</i>Friends</a>
            <a class="mdl-navigation__link" href="feed.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                               role="presentation">forum</i>Newsfeed</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">people</i>Gruppen</a>
            <div class="mdl-layout-spacer"></div>
        </nav>
    </div>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">


            <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s5.jpeg)">
                    <h2 class="mdl-card__title-text">Google+</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>FabriceAlpha</strong> My photo of dawn, landscape, nature, sky
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s1.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>vanlifers</strong> "Everything you do is based on the #choices you make" (Wayne Dyer)
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s2.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>rocketbeans.tv</strong> Den Montag haben wir heute im Zoo gestartet! Eisigkalt aber zuckersüß
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s3.jpg)">
                    <h2 class="mdl-card__title-text">Twitter</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>linustech</strong> Hardware porn, anyone? Amazing how Apple can make even the humble LGA socket look so sexy!‬
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s4.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>michael_krogmann</strong> It is just a picture with a #guy, some #smoke and a #skateboard. #420 #nicenstein 📸 by @tobischwertmann
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>


            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s6.jpeg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>CGIandi</strong> My newest work, check out more on whoople #nature #awesome
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s5.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>justinmaller</strong> "In Motion" - for @depthcore forever ago...‬
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s7.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>kraftklub</strong> Bis bald! Au revoir!
                    #toureiffel #pasdenuitpourparis #keinenachtfürparis
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s8.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>thomasbrezina</strong> Grüße aus Indien, wo ich meine Ayurveda-Kur genieße. Entspannung und Erholung für viel Neues in diesem Jahr...
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/s9.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <strong>mkbhd</strong> 1DX vlog rig? I think I can do this...
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

        </div>

    </main>
</div>
</body>
</html>
