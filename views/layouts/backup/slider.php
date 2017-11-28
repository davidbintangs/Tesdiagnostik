<?php 
    use \yii\helpers\Url;
        use \yii\helpers\Html;
 ?>

              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?=Url::base().'/dist/img/site/slider1.jpg';?>" alt="First slide">

                  </div>
                  <div class="item">
                    <img src="<?=Url::base().'/dist/img/site/slider2.jpg';?>" alt="Second slide">

                  </div>
                  <div class="item">
                    <img src="<?=Url::base().'/dist/img/site/slider3.jpg';?>" alt="Third slide">

 
                  </div>
                </div>
              </div>
              </div>
		    <div class="row">
		    <div class="col-md-12">
		        <!-- Box Comment -->
		         <div class="container">
		         <br/>
	
		         <div class="description-block"><h2><b>DONT JUST DREAM, DO!</b> Daftar sekarang</h2><?= Html::a('Daftar', ['signup'], [
		                'class'=>'btn btn-success btn-lg', 
		                'target'=>'_blank', 
		            	]); 
		            ?>
            	</div>
		         <br/>
		         <hr/>
			    <div class="login-box-body">
		         	<div class="col-md-7 pull-left">
		         			<h2>Pekerja terhebat untuk pekerjaan anda</h2>
		         			<p>Pilih pekerja dari tawaran terbaik yang diajukan dan mulailah pekerjaan besar anda </p>
		         		</div>

		         	<div class="col-md-5">
		         			<div class="embed-responsive embed-responsive-4by3">
							    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/p0SgEDEpvAE"></iframe>
							</div>
					</div>
		         </div>
		         <br/>
		        <br/>
		        <br/>
		        
		        <br/>
	 
						<hr/>
						<div class="login-box-body">
		         <div class="col-md-5">
		        <hr/>
		         			<div class="embed-responsive embed-responsive-4by3">
							    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NcxIJMEZd6Y"></iframe>
							</div>
		         </div>
				<div class="col-md-7 pull-right">
 				<hr/>
							<p style="text-align: right;">Pekerja terhebat untuk pekerjaan anda</p>
							<p style="text-align: right;">Pilih pekerja dari tawaran terbaik yang diajukan dan mulailah pekerjaan besar anda </p>
				</div>
				</div>

				<br/>
				<hr/>


		         </div>



		        	
		    </div>
		    </div>
