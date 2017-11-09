<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/materialize.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/perfect-scrollbar.css">
  <link rel="stylesheet" href="css/jquery-jvectormap.css">
  <link rel="stylesheet" href="css/flag-icon.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body class="layout-dark grey lighten-3">
  <!-- NAVEGADOR -->
  <header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
      <nav class="navbar-color azul-gris">

        <div class="nav-wrapper">
          <ul class="left">
            <li>
              <h1 class="logo-wrapper">
                <img class="brand-logo" src="img/aterrizar_blanco.png" alt="materialize logo" height="65">
              </h1>
            </li>
          </ul>
          <!-- <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
          <i class="material-icons">search</i>
          <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Busca un destino">
        </div> -->
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
              <i class="material-icons">shopping_cart<small class="notification-badge pink accent-2">3</small></i>
            </a>
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>CARRITO <span class="new badge">3</span></h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2"><span class="material-icons icon-bg-circle cyan small">flight</span> Un vuelo se ha añadido</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">Hace 2 horas</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2"><span class="material-icons icon-bg-circle red small">hotel</span> Tiene una reserva pendiente</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">Hace 3 días</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2"><span class="material-icons icon-bg-circle teal small">directions_car</span> Un coche se ha añadido</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">Hace 4 días</time>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown"><i class="material-icons">person</i></a>
            <ul id="profile-dropdown" class="dropdown-content" style="white-space: nowrap; opacity: 1; left: 1426.64px; position: absolute; top: 64px; display: none;">
              <li>
                <a href="#" class="grey-text text-darken-1"><i class="material-icons">face</i> Perfil</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1"><i class="material-icons">settings</i> Configuración</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1"><i class="material-icons">live_help</i> Ayuda</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="login.html" class="grey-text text-darken-1"><i class="material-icons">keyboard_tab</i> Cerrar Sesión</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- translation-button -->
        <!-- notifications-dropdown -->
        <!-- profile-dropdown -->
      </div>
    </nav>
  </div>
</header>
<!-- FIN NAVEGADOR -->


<div class="portada valign-wrapper">
  <div class="row valign-wrapper" style="margin: 0; width: 100%">
    <div class="col s12 m12 hide-on-large-only">
      <h1 class="white-text sombra">Descubre tu destino</h1>
    </div>
    <div class="col s12 m12 l3 offset-l1">
      <div class="card azul-gris z-depth-5">
        <div class="card-content white-text">
          <span class="card-title">Encontrá tu vuelo</span>
          <form action="#">
            <div class="row">
              <div id="opciones" class="col s12">
                <input name="vuelo" type="radio" id="idavuelta" checked />
                <label class="white-text" for="idavuelta">Ida y vuelta</label>
                <input name="vuelo" type="radio" id="soloida" />
                <label class="white-text" for="soloida">Solo ida</label>
              </div>
            </div>
            <div class="input-field col s12">
              <span class="material-icons prefix">flight_takeoff</span>
              <input id="origen" class="validate" name="origen" type="text" placeholder="Origen">
            </div>
            <div class="input-field col s12">
              <span class="material-icons prefix">flight_land</span>
              <input id="destino" class="validate" name="destino" type="text" placeholder="Destino">
            </div>
            <label class="col s12 white-text">FECHAS</label>
            <div class="input-field col s12 m6">
              <span class="material-icons prefix">date_range</span>
              <input id="ida" name="ida" type="text" class="datepicker" placeholder="Entrada">
            </div>
            <div class="input-field col s12 m6">
              <span class="material-icons prefix">date_range</span>
              <input id="regreso" name="regreso" type="text" class="datepicker" placeholder="Salida">
            </div>
            <div class="input-field col s12 m6">
              <span class="material-icons prefix">person</span>
              <input type="number" class="validate" name="personas" placeholder="Cant. personas">
            </div>
            <div class="input-field col s12 m6 center" style="padding-top: 10px">
              <input class="btn waves-effect waves-light" type="submit" name="buscar" value="Buscar">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6 hide-on-med-and-down">
      <h1 class="white-text sombra">Descubre tu destino</h1>
    </div>
  </div>
</div>


<!-- <div class="container">
<div class="row">
<div class="col s12 m4">
<div class="card azul-gris no-margin" style="height:400px">
<div class="card-content search white-text">
<span class="card-title">Encontrá tu vuelo</span>
<form action="#">
<div class="row">
<div class="col s12">
<input name="group1" type="radio" id="idavuelta" checked />
<label class="white-text" for="idavuelta">Ida y vuelta</label>
<input name="group1" type="radio" id="soloida" />
<label class="white-text" for="soloida">Solo ida</label>
</div>
</div>
<div class="input-field col s12">
<span class="material-icons prefix">flight_takeoff</span>
<input id="origen" class="validate" name="origen" type="text" placeholder="Origen">
</div>
<div class="input-field col s12">
<span class="material-icons prefix">flight_land</span>
<input id="destino" class="validate" name="destino" type="text" placeholder="Destino">
</div>
<label class="col s12 white-text">FECHAS</label>
<div class="input-field col s12 m6">
<span class="material-icons prefix">date_range</span>
<input id="ida" name="ida" type="text" class="datepicker" placeholder="Entrada">
</div>
<div class="input-field col s12 m6">
<span class="material-icons prefix">date_range</span>
<input id="regreso" name="regreso" type="text" class="datepicker" placeholder="Salida">
</div>
<div class="input-field col s12 m6">
<span class="material-icons prefix">person</span>
<input type="number" class="validate" name="personas" placeholder="Cant. personas">
</div>
<div class="input-field col s12 m6 center" style="padding-top: 10px">
<input class="btn waves-effect waves-light" type="submit" name="buscar" value="Buscar">
</div>
</form>
</div>
</div>
</div>
<div class="col s12 m8">
<div class="slider">
<ul class="slides">
<li>
<img src="img/banner.jpg">
<div class="caption center-align">
<h3>This is our big Tagline!</h3>
<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
<a class="btn waves-effect white grey-text darken-text-2">button</a>
</div>
</li>
<li>
<img src="https://lorempixel.com/580/250/nature/2">
<div class="caption left-align">
<h3>Left Aligned Caption</h3>
<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
</div>
</li>
<li>
<img src="https://lorempixel.com/580/250/nature/3">
<div class="caption right-align">
<h3>Right Aligned Caption</h3>
<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
</div>
</li>
<li>
<img src="https://lorempixel.com/580/250/nature/4">
<div class="caption center-align">
<h3>This is our big Tagline!</h3>
<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
</div>
</li>
</ul>
</div>
</div>
</div>
</div> -->

<div class="container">
  <div class="section">
    <div id="ecommerce-offer">

      <!-- statr items list -->
      <div id="item-posts" class="row">
        <div class="item-sizer"></div>

        <?php
        for ($i=0; $i < 10; $i++) {
          echo '<div class="item product">
          <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
          <a href="javascript:void(0)" class="btn-floating btn-large btn-price waves-effect waves-light">$25.609</a>
          <a href="javascript:void(0)">
          <img src="https://www.felicesvacaciones.es/img/2016/03/11/croacia.jpg" alt="item-img">
          </a>
          </div>
          <ul class="card-action-buttons">
          <li>
          <a class="btn-floating waves-effect waves-light cyan">
          <i class="material-icons">add_shopping_cart</i>
          </a>
          </li>
          <li>
          <a class="btn-floating waves-effect waves-light orange accent-2">
          <i class="material-icons">add_alert</i>
          </a>
          </li>
          <li>
          <a class="btn-floating waves-effect waves-light deep-orange accent-2">
          <i class="material-icons activator">info_outline</i>
          </a>
          </li>
          </ul>
          <div class="card-content">
          <div class="row">
          <div class="col s12">
          <p class="card-title grey-text text-darken-4"><a href="javascript:void(0)" class="grey-text text-darken-4">Croacia | Vuelo directo + 15 Dias</a>
          </p>
          </div>
          </div>
          </div>
          <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">
          <i class="material-icons right">close</i> Croacia | Vuelo directo + 15 Dias</span>
          <p>Here is some more information about this item that is only revealed once clicked on.</p>
          <button class="btn waves-effect waves-light" type="button" name="button">Más información</button>
          </div>
          </div>
          </div>';
        }
        ?>
      </div>

    </div>
  </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/prism.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/page-item.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/custom-script.js"></script>
<script src="http://localhost:35729/livereload.js"></script>


<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
      <span>Copyright ©2017 <a class="grey-text text-lighten-2" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">RemyOldor</a> All rights reserved.</span>
      <span class="right hide-on-small-only"> Desarrollado por <a class="grey-text text-lighten-2" href="https://pixinvent.com/">Cosme Fulanito</a></span>
    </div>
  </div>
</footer>
</body>
</html>
