<?php
use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

    AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');
    ?>
    
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
            <!-- calling header for admin -->
        <?php 
        if (Yii::$app->admin->isGuest) {?>
            <<body class="hold-transition skin-black layout-top-nav">
            <?php $this->beginBody() ?>
            <div class="wrapper">
            <?php
            }
        else{ 
          ?>
            <body class="hold-transition skin-black sidebar-mini fixed">
            <?php $this->beginBody() ?>
            <div class="wrapper">
              <!-- calling header for admin -->
              <?php
            }
        ?>


        <?php 
          if (Yii::$app->admin->isGuest) {?>
              <?= $this->render(
                  'headerUser.php',
                  ['directoryAsset' => $directoryAsset]
              );
             
          }
          else{ 
          ?>
              <?= $this->render(
                  'header.php',
                  ['directoryAsset' => $directoryAsset]
              );
          }
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>