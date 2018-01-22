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

<div id="overlay"></div>

<div class="fab">
    <i class="material-icons fab-icon">add</i>

    <form class='cntt-wrapper'>
        <div id="fab-hdr">
            <h3>Add Whoople</h3>
        </div>

        <div class="cntt">

            <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="whoopleName">Whoople-Name</label>
                <input class="mdl-textfield__input" type="text" list="socialMediaAvailable" id="whoopleName">
                <datalist id="socialMediaAvailable">
                </datalist>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="websiteLink">Website-Link</label>
                <input class="mdl-textfield__input" type="text" id="websiteLink"/>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="accountName">Account-Name</label>
                <input class="mdl-textfield__input" type="text" id="accountName"/>
            </div>

        </div>

        <div class="btn-wrapper">
            <button class="mdl-button mdl-js-button" id="cancel">Cancel</button>
            <button class="mdl-button mdl-js-button mdl-button--primary" id="submit">Submit</button>
        </div>

    </form>
</div>

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
                <span><!--?php echo $_SESSION['username']; ?--> Stefan Peyreder</span>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="profile.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                                  role="presentation">account_circle</i>Profile</a>
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
                     style="background-position: center; background-image: url(images/stefan.jpg)"></div>
            </div>

            <div class="mdl-card mdl-cell mdl-cell--8-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__supporting-text"">
                    <h4><!--?php echo $_SESSION['username']; ?--> Stefan Peyreder</h4>
                    Hello, my name is Stefan and this is my whoople page. Check out my newest posts and add me if you want to get in touch with me! <br><br>
                I think whoople is the best website to connect with all your friends, join the community today!
                </div>

                <div class="mdl-card__supporting-text">
                    You can see all my aready added Social Websites in the section bellow.

                </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Send Message</a>
            </div>

            </div>


            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card">
                    <h4>Make Post</h4>
                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield" style="width:unset; display: block">
                            <input class="mdl-textfield__input" type="text" id="sample1" style="font-size: 22px">
                            <label class="mdl-textfield__label" for="sample1" style="font-size: 22px;">What's on your
                                mind? <!--?php echo $_SESSION['username']; ?--> Stefan Peyreder</label>
                        </div>
                    </form>

                    <div class="mdl-card__actions">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Share your Post</a>
                    </div>
                </div>
            </div>


            <!-- Social Media already added content-->
            <ul class="demo-list-control mdl-list" id="socialMediaAdded"></ul>


            <div class="mdl-cell mdl-cell--12-col">
                <h3>Recent Posts</h3>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/p1.jpg)">
                    <h2 class="mdl-card__title-text">Instagram</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    I didn't choose the pug life, the pug life chose me.
                    #bordeaux #france #roadtrip
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/p2.jpg)">
                    <h2 class="mdl-card__title-text">Twitter</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    #cuba #slackline #travel #beach.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/p3.jpg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    #bruges #belgium lovely town
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/p4.jpg)">
                    <h2 class="mdl-card__title-text">Facebook</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Vielleicht wird alles vielleichter. Tanz mal drüber nach.
                    #santamonica #california #santamonicapier
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">GO TO PAGE</a>
                </div>
            </div>

            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300" style="background-position: center; background-image: url(images/p7.jpg)">
                    <h2 class="mdl-card__title-text">Google+</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    What a lovely place
                    #santamonica #california #santamonicapier
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
