<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="<?php echo base_url('images/DB_16х16.png')?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Material Dashboard Lite</title>

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">


  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Material Design Lite">


  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="<?php echo base_url('images/touch/ms-touch-icon-144x144-precomposed.png')?>">
  <meta name="msapplication-TileColor" content="#3372DF">

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
-->

<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet')?>">
<!-- inject:css -->
<link rel="stylesheet" href="<?php echo base_url('css/lib/getmdl-select.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('css/lib/nv.d3.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('css/application.min.css')?>">
<!-- endinject -->


</head>
<body>

<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <div class="mdl-card__supporting-text color--dark-gray">
                  <form class="" action="<?php echo base_url('login/dologin')?>" method="post">


                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="mdl-card__title-text text-color--smooth-gray">IoTicos Admin</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="login-name text-color--white">Sign in</span>
                            <span class="login-secondary-text text-color--smoke">Enter fields to sign in to Ioicos Admin</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" name="email" value="demo@demo.com" id="e-mail">
                                <label class="mdl-textfield__label" for="e-mail">Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="password" id="password" name="password" value="121212">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>

                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                            <a href="<?php echo base_url('register')?>" class="login-link">Don't have account?</a>
                            <div class="mdl-layout-spacer"></div>

                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                    SIGN IN
                                </button>

                        </div>
                    </div>

                  </form>
                  <div class="" style="color:red">
                    <?php echo $msg ?>
                  </div>
                </div>
            </div>
    </main>
</div>

<!-- inject:js -->
<script src="<?php echo base_url('js/d3.min.js')?>"></script>
<script src="<?php echo base_url('js/getmdl-select.min.js')?>"></script>
<script src="<?php echo base_url('js/material.min.js')?>"></script>
<script src="<?php echo base_url('js/nv.d3.min.js')?>"></script>
<script src="<?php echo base_url('js/layout/layout.min.js')?>"></script>
<script src="<?php echo base_url('js/scroll/scroll.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/discreteBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/linePlusBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/stackedBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/employer-form/employer-form.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/line-chart/line-charts-nvd3.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/map/maps.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/pie-chart/pie-charts-nvd3.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/table/table.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/todo/todo.min.js')?>"></script>
<!-- endinject -->

</body>
</html>
