 <?php
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use app\assets\DashboardAsset;
    use app\assets\AppAsset;

    use \yii\helpers\Url;

  
  dmstr\web\AdminLteAsset::register($this);
?>  


        <!-- calling header for guest -->

<header class="main-header">
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a href=<?php echo Url::home(); ?> class="navbar-brand"><img src="<?=Url::base().'/dist/img/kreatifkita.png';?>" class="img-responsive center-block" alt="kreatifkita" width="170"></a>
         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          
            <i class="fa fa-bars"></i>
          </button>
    </nav>
    </header>
    <br/>

    