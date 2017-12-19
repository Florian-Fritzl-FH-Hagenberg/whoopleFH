<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}
?>


<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Whoople is the easy wasy to connect all your social media accounts">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>whoople</title>

<<<<<<< HEAD
=======
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles.css">
>>>>>>> d54755ce6395d1078b8ff217e03d0dd663cc512b
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext" rel="stylesheet"/>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="jquery-3.2.1.js"></script>
    <script src="script.js"></script>


    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
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
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
              <a href="index.php">whoople</a>
            <!--<img class="android-logo-image" src="images/android-logo.png">-->
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation
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
            <img class="android-logo-image" src="images/android-logo.png">
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
            -->
        </div>
    </div>


    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">

            <div class="materialContainer">
                <div class="box">
                    <div class="title">LOGIN</div>

                    <div class="input">
                        <label for="loginusername">Username</label>
                        <input type="text" name="loginusername" id="loginusername" required>
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="loginpassword">Password</label>
                        <input type="password" name="loginpassword" id="loginpassword" required>
                        <span class="spin"></span>
                    </div>

                    <div class="button login">
                        <button id="loginButton"><span>GO</span> <i class="fa fa-check"></i></button>
                    </div>

                    <a href="" class="pass-forgot">Forgot your password?</a>

                </div>


                <div class="overbox">
                    <div class="material-button alt-2"><span class="shape"></span></div>

                    <div class="title">REGISTER</div>

                    <div class="input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="mail">E-Mail</label>
                        <input type="text" name="mail" id="mail" required>
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="regpass">Password</label>
                        <input type="password" name="regpass" id="regpass" required>
                        <span class="spin"></span>
                    </div>

                    <div class="input">
                        <label for="reregpass">Repeat Password</label>
                        <input type="password" name="reregpass" id="reregpass" required>
                        <span class="spin"></span>
                    </div>

                    <div class="button">
                        <button id="registerButton"><span>NEXT</span></button>
                    </div>
                </div>
            </div>



            <!--<div class="logo-font android-slogan">be together. not the same.</div>
            <div class="logo-font android-sub-slogan">welcome to android... be yourself. do your thing. see what's going on.</div>
            <div class="logo-font android-create-character">
                <a href=""><img src="images/andy.png"> create your android character</a>
            </div> -->

            <a href="#screens">
                <button class="android-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                    <i class="material-icons">expand_more</i>
                </button>
            </a>
        </div>



        <div class="android-screen-section mdl-typography--text-center">
            <div class="mdl-typography--display-1-color-contrast">What is Whoople?</div>
            <div class="android-screens">
                <p class="mdl-typography--headline mdl-typography--font-thin">Whoople is a free social media site,
                    designed to simplify your daily life. Whoople currently supports
                    Facebook, Twitter, Google+, Instagram and many more. The service is available on any device!
                    Register
                    now for free and try it out by yourself!</p>
                <p>
                    <a class="mdl-typography--font-regular mdl-typography--text-uppercase android-alt-link" href="">
                        Check it out and register now&nbsp;<i class="material-icons">chevron_right</i>
                    </a>
                </p>
            </div>
        </div>

        <div class="android-wear-section">
            <div class="android-wear-band">
                <div class="android-wear-band-text">
                    <div class="mdl-typography--display-2 mdl-typography--font-thin">Connect your social networks</div>
                    <p class="mdl-typography--headline mdl-typography--font-thin">
                        Whoople works perfectly with every device. Once set up, you just need to log in and enjoy the
                        simplicity of staying connected.
                    </p>
                    <p>
                        <a class="mdl-typography--font-regular mdl-typography--text-uppercase android-alt-link" href="">
                            Register now for free&nbsp;<i class="material-icons">chevron_right</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="android-customized-section">
            <div class="android-customized-section-text">
                <div class="mdl-typography--font-light mdl-typography--display-1-color-contrast">Customise your
                    preferences
                </div>
                <p class="mdl-typography--font-light">
                    All the connections you care abour. All your whooples. Every feed and every notification in one
                    place. Try it out.
                    <br>
                    <a href="" class="android-link mdl-typography--font-light">Customise your whoople now</a>
                </p>
            </div>
            <div class="android-customized-section-image"></div>
        </div>

        <!--
        <div class="android-more-section">
            <div class="android-section-title mdl-typography--display-1-color-contrast">More from Android</div>
            <div class="android-card-container mdl-grid">
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                    <div class="mdl-card__media">
                        <img src="images/more-from-1.png">
                    </div>
                    <div class="mdl-card__title">
                        <h4 class="mdl-card__title-text">Get going on Android</h4>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to Android quick and easy</span>
                    </div>
                    <div class="mdl-card__actions">
                        <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                            Make the switch
                            <i class="material-icons">chevron_right</i>
                        </a>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                    <div class="mdl-card__media">
                        <img src="images/more-from-4.png">
                    </div>
                    <div class="mdl-card__title">
                        <h4 class="mdl-card__title-text">Create your own Android character</h4>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <span class="mdl-typography--font-light mdl-typography--subhead">Turn the little green Android mascot into you, your friends, anyone!</span>
                    </div>
                    <div class="mdl-card__actions">
                        <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                            androidify.com
                            <i class="material-icons">chevron_right</i>
                        </a>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                    <div class="mdl-card__media">
                        <img src="images/more-from-2.png">
                    </div>
                    <div class="mdl-card__title">
                        <h4 class="mdl-card__title-text">Get a clean customisable home screen</h4>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <span class="mdl-typography--font-light mdl-typography--subhead">A clean, simple, customisable home screen that comes with the power of Google Now: Traffic alerts, weather and much more, just a swipe away.</span>
                    </div>
                    <div class="mdl-card__actions">
                        <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                            Download now
                            <i class="material-icons">chevron_right</i>
                        </a>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                    <div class="mdl-card__media">
                        <img src="images/more-from-3.png">
                    </div>
                    <div class="mdl-card__title">
                        <h4 class="mdl-card__title-text">Millions to choose from</h4>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <span class="mdl-typography--font-light mdl-typography--subhead">Hail a taxi, find a recipe, run through a temple – Google Play has all the apps and games that let you make your Android device uniquely yours.</span>
                    </div>
                    <div class="mdl-card__actions">
                        <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                            Find apps
                            <i class="material-icons">chevron_right</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        -->

        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer__left-section">
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Privacy & Terms</a></li>
                </ul>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
