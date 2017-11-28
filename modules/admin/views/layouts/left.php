<?php 
use yii\helpers\Url;
 ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-responsive" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Admin Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Member', 'icon' => 'file-code-o', 'url' => ['/admin/identitas']],
                    ['label' => 'Transaksi', 'icon' => 'file-code-o', 'url' => ['/#']],
                    [
                        'label' => 'Proyek',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'List', 'icon' => 'dashboard', 'url' => ['/admin/proyek']],
                            ['label' => 'Penawaran', 'icon' => 'dashboard', 'url' => ['/admin/identitas-menawar-proyek']],
                            ['label' => 'Pengerjaan', 'icon' => 'dashboard', 'url' => ['/admin/identitas-mengerjakan-proyek']],
                            ['label' => 'Kategori Proyek', 'icon' => 'dashboard', 'url' => ['/admin/kategori-budget']],   
                        ],
                    ],
                    [
                        'label' => 'Keahlian',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'List', 'icon' => 'dashboard', 'url' => ['/admin/keahlian']],
                            ['label' => 'Kategori Keahlian', 'icon' => 'dashboard', 'url' => ['/admin/jenis-keahlian']], 
                        ],
                    ],
                    ['label' => 'Grafik', 'icon' => 'file-code-o', 'url' => ['/#']],


                ],
            ]
        ) ?>

    </section>

</aside>
