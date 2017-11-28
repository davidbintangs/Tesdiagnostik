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
?>  


<header class="main-header">
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a href=<?php echo Url::home(); ?> class="navbar-brand"><img src="<?=Url::base().'/dist/img/kreatifkita.png';?>" class="img-responsive center-block" alt="kreatifkita" width="170"></a>
         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          
            <i class="fa fa-bars"></i>
          </button>
        </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

        

        </div>
        <!-- /.navbar-collapse -->

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           <ul class="nav navbar-nav"> 
            <li><a href="<?php echo Url::to(['site/login']); ?>">Login</a></li>
          </ul>
           <ul class="nav navbar-nav"> 
            <li><a href="<?php echo Url::to(['site/signup']); ?>">Signup</a></li>
          </ul>
            
            
          </ul>
        </div>
    </div>
    </nav>
    </header>