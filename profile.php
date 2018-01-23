<?php
//include auth.php file on all secure pages
include("authentication.php");
//require database for user information
require("database.php");
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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

    <!-- Compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    <link rel="stylesheet" href="styles.css">

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="jquery-3.2.1.js"></script>
    <script src="script_dashboard.js"></script>
    <script src="script.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>

</head>
<body>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">whoople</span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search" id="searchButton">
                    <i class="material-icons">search</i>
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
                <span><?php echo $_SESSION['forename']; ?>&nbsp;<?php echo $_SESSION['lastname']; ?></span>
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

            <div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand"
                     style="background-position: center; background-image: url(images/flo.jpg)"></div>
            </div>

            <div class="mdl-card mdl-cell mdl-cell--8-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__supporting-text" style="min-height: 200px; position: relative">
                    <h4>Florian Fritzl</h4>
                    <!--?php echo $_SESSION['description']; ?-->
                    Hey, i am Florian. I am one of the creative minds behind whoople. Send me a message to get in touch
                    with me! <br><br>
                    I think whoople is the best website to connect with all your friends, join the community today!
                    You can see all my aready added Social Websites in the section bellow or add me as a friend.
                </div>
                <div class="mdl-card__actions mdl-card--border" style="position: relative; bottom: 0px;">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Send Message</a>
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Add as Friend</a>
                </div>

            </div>

            <div class="mdl-cell mdl-cell--12-col">
                <h3>Recent Posts</h3>
            </div>


            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f1.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    This sunset in Kos, Greek is probably the most beautiful shot i ever managed to take.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f2.jpg)">
                    <h2 class="mdl-card__title-text">Twitter</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    What a match!

                    #football #soccer #matchday #austria #georgia #wearefootball #eleven #kick #pass
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f3.jpg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Wunderbarer Abend mit einer tollen Schiffsfahrt auf der MS Stadt Linz und geilem Essen gekrönt vom
                    Donau in Flammen Feuerwerk mit Musik!
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f4.jpg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Today was a chill summer day hanging out with @vicky_langeder @viktorh_ and @_pezii_ ending at the
                    main place in #perg
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f6.jpg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Awesome day in the nature. Love it.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300"
                     style="background-position: center; background-image: url(images/f5.jpg)">
                    <h2 class="mdl-card__title-text">Google+</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Today Lightroom had to fix what the weather couldn't do for the camera 😀😊 #sunday #landscape
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--12-col">
                <h3>Added whooples</h3>
            </div>

            <!-- Social Media already added content-->
            <ul class="demo-list-control mdl-list" id="#">
                <li class="mdl-list__item"> <span class="mdl-list__item-primary-content"> <i class="material-icons  mdl-list__item-avatar">person</i>Facebook</span>Florian Fritzl</a></li>
                <li class="mdl-list__item"> <span class="mdl-list__item-primary-content"> <i class="material-icons  mdl-list__item-avatar">person</i>Instagram</span>florianfritzl</a></li>
            </ul>


    </main>
</div>
</body>
</html>
