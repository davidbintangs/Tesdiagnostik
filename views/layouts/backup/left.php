<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Admin Profil Dosen', 'options' => ['class' => 'header']],
                    // ['label' => 'Agama', 'icon' => 'fa fa-file-code-o', 'url' => ['/agama']],                    
                    // ['label' => 'Jenis Kelamin', 'icon' => 'fa fa-file-code-o', 'url' => ['/jenis-kelamin']],
                    
                    ['label' => 'Pegawai', 'icon' => 'fa fa-users', 'url' => ['/pegawai']],                   
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Fakultas',
                        'icon' => 'fa fa-building',
                        'url' => '#',
                        'items' => 
                        [
                            ['label' => 'Fakultas', 'icon' => 'fa fa-plus', 'url' => ['/fakultas']],
                             ['label' => 'Jurusan', 'icon' => 'fa fa-plus', 'url' => ['/unit-kerja']],
                        ],
                    ],
                    ['label' => 'Jabatan',
                        'icon' => 'fa fa-briefcase',
                        'url' => '#',
                        'items' => 
                        [
                            ['label' => 'Golongan Ruang', 'icon' => 'fa fa-plus', 'url' => ['/gol-ruang']],
                            ['label' => 'Jabatan Fungsional', 'icon' => 'fa fa-plus', 'url' => ['/jabatan-fungsional']],
                           ['label' => 'Jabatan Struktural', 'icon' => 'fa fa-plus', 'url' => ['/jabatan-struktural']],
                           ['label' => 'Jenis Staf', 'icon' => 'fa fa-plus', 'url' => ['/jenis-staf']],
                    
                        ],
                    ],

                    ['label' => 'Pendidikan',
                        'icon' => 'fa fa-book',
                        'url' => '#',
                        'items' => 
                        [
                            ['label' => 'Pendidikan Tertinggi', 'icon' => 'fa fa-plus', 'url' => ['/pendidikan-tertinggi']],
                            ['label' => 'Riwayat Pendidikan Dasar', 'icon' => 'fa fa-plus', 'url' => ['/riwayat-pendidikan-dasar']],
                    
                        ],
                    ],
                    ['label' => 'Penelitian',
                        'icon' => 'fa fa-rocket',
                        'url' => '#',
                        'items' => 
                        [
                            ['label' => 'Penelitain P2m', 'icon' => 'fa fa-plus', 'url' => ['/infopenelitian-p2m']],
                           ['label' => 'Anggota Penelitan', 'icon' => 'fa fa-plus', 'url' => ['/anggotapenelitian']],
                    
                        ],
                    ],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
