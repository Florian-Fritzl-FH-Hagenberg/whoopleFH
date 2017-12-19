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

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">whoople</span>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link mdl-typography--text-uppercase" href="logout.php">Sign out</a>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search" id="searchButton">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search">
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">About</li>
                <li class="mdl-menu__item">Contact</li>
                <li class="mdl-menu__item">Legal information</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span>hello@example.com</span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item">hello@example.com</li>
                    <li class="mdl-menu__item">info@example.com</li>
                    <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
                </ul>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                                role="presentation">home</i>Home</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">inbox</i>Inbox</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">forum</i>Newsfeed</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">people</i>Gruppen</a>
            <div class="mdl-layout-spacer"></div>

            <!--
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                       role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a> -->
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <!--
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
              <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                <use xlink:href="#piechart" mask="url(#piemask)" />
                <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan font-size="0.2" dy="-0.07">%</tspan></text>
              </svg>
              <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                <use xlink:href="#piechart" mask="url(#piemask)" />
                <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>
              </svg>
              <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                <use xlink:href="#piechart" mask="url(#piemask)" />
                <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>
              </svg>
              <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                <use xlink:href="#piechart" mask="url(#piemask)" />
                <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>
              </svg>
            </div>
            -->
            <!-- Three Line List with secondary info and action -->

            <div class="mdl-cell mdl-cell--8-col">
                <p>Login Successful. Welcome <?php echo $_SESSION['username']; ?>!</p>
            </div>
            <div class="mdl-cell mdl-cell--8-col">
                <a>Already added Social Websites</a>
            </div>

            <?php
            $query = "SELECT wwhoople.wWhoople_Website, wwhoople.wWhoople_AccountName FROM `wwhoople`, wuser where wuser.wUser_ID = wwhoople.wUser_ID and wusername = '$_SESSION[username]';";
            $result = mysqli_query($connection, $query);
            $connection->close();
            ?>

            <?php debug_to_console($result[1][0]);?>

            <?php function debug_to_console( $data ) {
                $output = $data;
                if ( is_array( $output ) )
                    $output = implode( ',', $output);

                echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
            };?>

<!--
            <ul class="demo-list-control mdl-list">
                <!--?php foreach ($result as $whoople): ?>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons  mdl-list__item-avatar">person</i>
                            <!--?= $whoople ?>
                        </span>
                    </li>
                <!--?php endforeach; ?>
            </ul>

            <!-- <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         Facebook
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         Twitter
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         Instagram
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             </li>
             <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         Google+
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             </li>
             <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         Skype
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             </li>
             <li class="mdl-list__item">
                 <span class="mdl-list__item-primary-content">
                     <i class="material-icons  mdl-list__item-avatar">person</i>
                         WhatsApp
                 </span>
                 <span class="mdl-list__item-secondary-action">
                     <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">add_circle_outline</i></a>
                 </span>
             </li>
             </ul>
             -->


            <div class="mdl-cell mdl-cell--8-col">
                <a>Avalible Social Websites</a>
            </div>

            <ul class="demo-list-control mdl-list">
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            Facebook
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            Twitter
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            Instagram
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            Google+
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            Skype
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>
                </li>
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons  mdl-list__item-avatar">person</i>
                            WhatsApp
                    </span>
                    <span class="mdl-list__item-secondary-action">
                        <a class="mdl-list__item-secondary-action" href="#"><i
                                class="material-icons">add_circle_outline</i></a>
                    </span>
                </li>

            </ul>


            <!--
            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">
                    <use xlink:href="#chart"/>
                </svg>
                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">
                    <use xlink:href="#chart"/>
                </svg>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div
                    class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                        <h2 class="mdl-card__title-text">Updates</h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                        Non dolore elit adipisicing ea reprehenderit consectetur culpa.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
                    </div>
                </div>
                <div class="demo-separator mdl-cell--1-col"></div>
                <div
                    class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                        <h3>View options</h3>
                        <ul>
                            <li>
                                <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Click per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Views per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects selected</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects viewed</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change
                            location</a>
                        <div class="mdl-layout-spacer"></div>
                        <i class="material-icons">location_on</i>
                    </div>
                </div>
            </div>

            -->
        </div>
    </main>
</div>

<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
