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

         <ul class="nav navbar-nav"> 
            <li><a href="<?php echo Url::to(['portofolio/index']); ?>">Portofolio</a></li>
          </ul>

          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rekrut <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo Url::to(['proyek/create']); ?>">Buat proyek</a></li>
                <li><a href="<?php echo Url::to(['freelance/index']); ?>">Telusuri Freelancer</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyek <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo Url::to(['proyek/index']); ?>">Semua Proyek</a></li>
                <li><a href="<?php echo Url::to(['proyek/proyek-keahlian']); ?>">sesuai keahlian</a></li>
              </ul>
            </li>
          </ul>

           <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="<?php echo Url::to(['proyek/proyek-saya']); ?>">Proyek Saya</a>
            </li>
          </ul>
            <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="<?php echo Url::to(['proyek/pekerjaan-saya']); ?>">Pekerjaan Saya</a>
            </li>
          </ul>

        </div>
        <!-- /.navbar-collapse -->

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            
            <!-- ini adalah identifikasi member -->
            <?php
              
                   $member=Yii::$app->user->identity->username;
                  $username=$member;
                
             ?>

            <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo Url::base().'/dist/img/member_'.Yii::$app->user->identity->id.'.jpg';?>  " class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                        <?=$username;?>
                          
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->

                        <li class="user-header">

                          <img src="<?php echo Url::base().'/dist/img/member_'.Yii::$app->user->identity->id.'.jpg';?>" class="img"alt="User Image"/>

                            <p>
                            <?=$username?> - Member 
                            </p>
                            <p>
                             <i class="fa fa-circle text-success"></i> Online
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?=Url::to(['profil/']);?>
" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
          </ul>
        </div>
    </div>
    </nav>
    </header>