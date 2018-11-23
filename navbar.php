
<?php
session_start();
if(isset($_SESSION['nombre'])){
  if($_SESSION['nombre']!=""){
  $nav='
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="cerrar_session.php">Cerrar Sesion</a></li>
    </ul>
    <div class="navbar-fixed ">
    <nav class="indigo">
    
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="fab fa-studiovinari fa-2x"></i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">'.$_SESSION['nombre'].'<i class="material-icons right">arrow_drop_down</i></a></li>
         </ul>
      </div>
      
    </nav>
  </div>';
  }

}else {
    $nav='<div class="navbar-fixed ">
    <nav class="indigo">
    
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="login.php" class="waves-effect waves-light">Log In</a></li>
          <li><a href="register.php" class="waves-effect waves-light">Register</a></li>
        </ul>
      </div>
      
    </nav>
  </div>';


  
}
  ?>