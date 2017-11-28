<?php
    /* @var $this \yii\web\View */
    /* @var $content string */
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use app\assets\DashboardAsset;
    use app\assets\FrontendAsset;
    use app\assets\AppAsset;
    use \yii\helpers\Url;
   
     AppAsset::register($this);
      //dmstr\web\AdminLteAsset::register($this);
      $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');
      ?>
      <?php $this->beginPage() ?>
  <!DOCTYPE html>
  <html lang="<?= Yii::$app->language ?>">
    <head>
       <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
      <?php $this->beginBody() ?>
      <body class="hold-transition skin-black layout-top-nav">
      <div class="wrapper">
        <!-- memanggil header -->
        <?php 
          if (Yii::$app->user->isGuest) {?>
              <?= $this->render(
                  'headerNonMember.php',
                  ['directoryAsset' => $directoryAsset]
              );
             
          }
          else{ 
          ?>
              <!-- memanggil header -->
              <?= $this->render(
                  'header.php',
                  ['directoryAsset' => $directoryAsset]
              );
          }
        ?>
        <?php 
          if (Yii::$app->controller->action->id == 'login') { 
               echo $this->render('slider');
          }         
         ?>
      <div class="content-wrapper">
        <div class="container">
          <?= Breadcrumbs::widget([
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
              ]) ?>
          <?= \app\widgets\Alert::widget(); ?>
          <br/><br/><br/>
          <!-- menampilkan konten agar nantinya dapat konten dapat dinamis -->
          <?= $content ?>
        </div>
      </div>
      <?php 
          if (Yii::$app->controller->action->id == 'login') { 
               echo $this->render('footerNonMember');
          }else{
            echo $this->render('footer.php');
          }         
         ?>
      <!-- Memanggil file footer -->
    
  <?php $this->endBody() ?>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/596873896edc1c10b0345f4b/1bl01gmcu';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
  </html>
  <?php $this->endPage()?>