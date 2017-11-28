 <?php
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use app\assets\DashboardAsset;
    use app\assets\AppAsset;
    use \yii\helpers\Url;
    //AppAsset::register($this);
    dmstr\web\AdminLteAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');
?>

<style>
    #fh5co-header {
  position: absolute;
  z-index: 99;
  width: 100%;
  opacity: 1;
  top: 0;
  margin-top: 40px;
}
@media screen and (max-width: 768px) {
  #fh5co-header {
    margin-top: 0;
    background: #fff;
    -webkit-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
  }
  #fh5co-header .navbar-brand {
    color: #52d3aa !important;
  }
  #fh5co-header #navbar li a {
    color: rgba(0, 0, 0, 0.5) !important;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
  }
  #fh5co-header #navbar li a:hover {
    color: #52d3aa !important;
  }
  #fh5co-header #navbar li a span:before {
    background: transparent !important;
  }
  #fh5co-header #navbar li.active a {
    background: transparent;
    background: none;
    color: #52d3aa !important;
  }
  #fh5co-header #navbar li.active a span:before {
    visibility: visible;
    -webkit-transform: scaleX(1);
    transform: scaleX(1);
  }
}
#fh5co-header .navbar {
  padding-bottom: 0;
  margin-bottom: 0;
}
#fh5co-header #navbar li a {
  font-family: "Source Sans Pro", Arial, sans-serif;
  color: rgba(255, 255, 255, 0.5);
  position: relative;
  font-size: 19px;
  font-weight: 300;
}
#fh5co-header #navbar li a span {
  position: relative;
  display: block;
  padding-bottom: 2px;
}
#fh5co-header #navbar li a span:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: rgba(255, 255, 255, 0.5);
  visibility: hidden;
  -webkit-transform: scaleX(0);
  -moz-transform: scaleX(0);
  -ms-transform: scaleX(0);
  -o-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
#fh5co-header #navbar li a:hover {
  color: #fff;
}
#fh5co-header #navbar li a:hover span:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  -moz-transform: scaleX(1);
  -ms-transform: scaleX(1);
  -o-transform: scaleX(1);
  transform: scaleX(1);
}
#fh5co-header #navbar li.active a {
  background: transparent;
  background: none;
  color: #fff;
}
#fh5co-header #navbar li.active a span:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
#fh5co-header .navbar-brand {
  float: left;
  display: block;
  font-size: 30px;
  font-weight: 700;
  padding-left: 0;
  color: #fff;
}
#fh5co-header.navbar-fixed-top {
  position: fixed !important;
  background: #fff;
  -webkit-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.1);
  margin-top: 0px;
  top: 0;
}
#fh5co-header.navbar-fixed-top .navbar-brand {
  color: #52d3aa;
}
#fh5co-header.navbar-fixed-top #navbar li a {
  color: rgba(0, 0, 0, 0.5);
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}
#fh5co-header.navbar-fixed-top #navbar li a:hover {
  color: #52d3aa;
}
#fh5co-header.navbar-fixed-top #navbar li.active a {
  background: transparent;
  background: none;
  color: #52d3aa;
}
#fh5co-header.navbar-fixed-top #navbar li.active a span:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
  background-color: #52d3aa;
}
#fh5co-header .navbar-default {
  border: transparent;
  background: transparent;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  -ms-border-radius: 0px;
  border-radius: 0px;
}
@media screen and (max-width: 768px) {
  #fh5co-header .navbar-default {
    margin-top: 0px;
    padding-right: 0px;
    padding-left: 0px;
  }
}
#fh5co-header .navbar-default .brand-slogan {
  margin: 28px 0 0 15px;
  float: left;
  letter-spacing: 2px;
  color: #adadad;
}
#fh5co-header .navbar-default .brand-slogan em {
  color: #52d3aa;
  font-style: normal;
}
#fh5co-header a {
  -webkit-transition: 0s;
  -o-transition: 0s;
  transition: 0s;
}   
</style>
<header role="banner" id="fh5co-header">
            <div class="container">
                <!-- <div class="row"> -->
                <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                 <a class="navbar-brand" href="index.html">Kreatifkita.id</a> 
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    
                     <li><a href="<?php echo Url::to(['site/signup']); ?>">Signup</a></li>
                  </ul>
                </div>
                </nav>
              <!-- </div> -->
          </div>
    </header>


<!-- <header class="main-header">
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a href=<?php echo Url::home(); ?> class="navbar-brand"><img src="<?=Url::base().'/dist/img/kreatifkita.png';?>" class="img-responsive center-block" alt="kreatifkita" width="170"></a>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#signin">Signin</a>
            </li>
            <li class="dropdown">
              <a href="<?php echo Url::to(['site/signup']); ?>">Signup</a>
            </li>

          </ul>
        </div>
    </div>
    </nav>
    </header>
    
 -->