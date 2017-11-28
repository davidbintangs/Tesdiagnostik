<?php
use yii\helpers\Html;
    use \yii\helpers\Url;
    use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<div class="banner-grid">
    <div class="container">
      <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider3">
          <li>
            <div class="banner-text">
              <h3  class="wow bounceIn" data-wow-delay="0.50s">Kreatifkita.id</h3>
              <p class="wow fadeInUp" data-wow-delay="0.90s">Website Portal kreatif untuk mewujudkan proyek impian anda, ayo lakukan sekarang juga!</p>
            </div>
          </li>
          
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--banner-->
    <!--about-->
      <div class="about-section"  id="about">
        <div class="container">
          <h2>Tentang Kami</h2>
          <div class="about-grids">
            <div class="col-md-4 about-grid  wow fadeInLeft animated" data-wow-delay=".5s">
              <img src="images/p1.jpg" class="img-responsive" alt=""/>
              <div class="about-details hvr-rectangle-in">
                <div class="about-text">
                  <h5>1</h5>
                </div>
                <h4>Buat Proyek anda Sekarang!</h4>
                <p>Buat proyek anda sekarang dan cari pekerja terbaik untuk mewujudkannya,</p>
              </div>
            </div>
            <div class="col-md-4 about-grid  wow fadeInDownBig animated animated" data-wow-delay="0.4s">
            <img src="images/p1.jpg" class="img-responsive" alt=""/>
            <div class="about-details hvr-rectangle-in">
                <div class="about-text">
                  <h5>2</h5>
                </div>
                <h4>Jadilah Freelance dan dapatkan semua keuntungannya</h4>
                <p>Menjadi pekerja terbaik untuk proyek terbaik, dan dapatkan keuntungannya</p>
              </div>
            </div>
            <div class="col-md-4 about-grid  wow fadeInRight animated" data-wow-delay=".5s">
            <img src="images/p2.jpg" class="img-responsive" alt=""/>
            <div class="about-details hvr-rectangle-in">
                <div class="about-text">
                  <h5>3</h5>
                </div>
                <h4>Morbi Rutrum Ligula</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu euismod risus, eget sodales nulla. Phasellus justo quam, ullamcorper convallis erat ut, finibus sagittis diam.</p>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    <!--about-->
    <!--services-->
    <div class="services-section" id="services">
      <div class="container">
        <h3>Our Services</h3>
        <div class="servc-grids">
          <div class="col-md-6 servc-grid wow fadeInLeft animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-th-large effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Cum soluta nobis est eligendi</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="col-md-6 servc-grid wow fadeInRight animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-user effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Soluta nobis est cum eligendi</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="servc-grids">
          <div class="col-md-6 servc-grid wow fadeInLeft animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-stats effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Eligendi cum soluta nobis est</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="col-md-6 servc-grid wow fadeInRight animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-globe effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Nobis cum soluta est eligendi</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="servc-grids">
          <div class="col-md-6 servc-grid wow fadeInLeft animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-cog effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Cum soluta nobis est eligendi</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="col-md-6 servc-grid wow fadeInRight animated" data-wow-delay=".5s">
            <div class="col-xs-3 servc-grid-left">
              <span class="glyphicon glyphicon-link effect-1" aria-hidden="true"></span>
            </div>
            <div class="col-xs-9 servc-grid-right">
              <h4>Soluta nobis cum est eligendi</h4>
              <p>Itaque earum rerum hic tenetur a sapiente delectus 
              reiciendis maiores alias consequatur aut</p>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!--services-->
    <!--projects-->
      <div class="project  wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" id="gallery">
        <div class="container">
          <h3>Our Gallery</h3>
          <div class="gallery-grids">
            <section>
              <ul id="da-thumbs" class="da-thumbs">
                <li>
                  <a href="images/g11.jpg" class="b-link-stripe b-animate-go thick box">
                    <img src="images/g11.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g12.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g02.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g13.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g13.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g14.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g14.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>  
                  <a href="images/g15.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g15.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g16.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g16.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g17.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g17.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g18.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g18.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="images/g14.jpg" class="b-link-stripe b-animate-go  thick box">
                    <img src="images/g14.jpg" alt="" />
                    <div>
                      <h5>view</h5>
                      <span>non suscipit leo fringilla non suscipit leo fringilla molestie</span>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="clearfix"> </div>
            </section>
            <script type="text/javascript" src="js/jquery.hoverdir.js"></script>  
              <script type="text/javascript">
              $(function() {
              
                $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

              });
            </script>
          </div>
        </div>
      </div>
<!--gallery-->


    <!--projects-->
    <!--team-->
      <div class="team" id="teams">
        <div class="container">
          <h3>Our Teams</h3>
          <div class="team-grids">
            <div class="col-md-4 team-gd text-center wow fadeInLeft animated" data-wow-delay=".5s">
              <div class="morph pic">
                <img src="images/t1.jpg" alt="">
              </div>
              <h4>victoria</h4>
              <div class="social-icons">
                <a href="#"><i class="icon"></i></a>
                <a href="#"><i class="icon1"></i></a>
                <a href="#"><i class="icon2"></i></a>
                <a href="#"><i class="icon3"></i></a>
              </div>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu euismod risus, eget sodales nulla. Phasellus justo quam, ullamcorper convallis erat ut.</p>
            </div>
            <div class="col-md-4 team-gd text-center wow fadeInUpBig animated animated" data-wow-delay="0.4s">
              <div class="morph pic">
                <img src="images/t2.jpg" alt="">
              </div>
              <h4>patrick pool</h4>
              <div class="social-icons">
                <a href="#"><i class="icon"></i></a>
                <a href="#"><i class="icon1"></i></a>
                <a href="#"><i class="icon2"></i></a>
                <a href="#"><i class="icon3"></i></a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu euismod risus, eget sodales nulla. Phasellus justo quam, ullamcorper convallis erat ut.</p>
            </div>
            <div class="col-md-4 team-gd text-center wow fadeInRight animated" data-wow-delay=".5s">
              <div class="morph pic">
                <img src="images/t3.jpg" alt="">
              </div>
              <h4>Thomson</h4>
              <div class="social-icons">
                <a href="#"><i class="icon"></i></a>
                <a href="#"><i class="icon1"></i></a>
                <a href="#"><i class="icon2"></i></a>
                <a href="#"><i class="icon3"></i></a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu euismod risus, eget sodales nulla. Phasellus justo quam, ullamcorper convallis erat ut.</p>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    <!--team-->
    <div class="pricing-section" id="prices">
      <div class="container">
        <h3> Our Prices</h3>
        <div class="pricing-grids">
          <div class="col-md-3 pricing-grid wow fadeInLeft animated" data-wow-delay=".5s">
            <div class="pricing-top">
              <h4>Basic</h4>
            </div>
            <div class="pricing-bottom">
              <h5>$ 15.99 <span>P/M</span></h5>
                <ul>
                  <li>5 GB Storage</li>
                  <li>100 Email Accounts</li>
                  <li>Maximum Speed</li>
                  <li>Advanced DNS Control</li>
                  <li>Unlimited Bandwith</li>
                  <li>24/7 Support</li>
                </ul>
                <a href="#" class="button1 hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal1">Buy Now</a>
            </div>
          </div>
          <div class="col-md-3 pricing-grid wow fadeInDownBig animated animated" data-wow-delay="0.4s">
            <div class="pricing-top">
              <h4>Premium</h4>
            </div>
            <div class="pricing-bottom">
              <h5>$ 15.99 <span>P/M</span></h5>
                <ul>
                  <li>5 GB Storage</li>
                  <li>100 Email Accounts</li>
                  <li>Maximum Speed</li>
                  <li>Advanced DNS Control</li>
                  <li>Unlimited Bandwith</li>
                  <li>24/7 Support</li>
                </ul>
                <a href="#" class="button1 hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal1">Buy Now</a>
            </div>
          </div>
          <div class="col-md-3 pricing-grid wow fadeInUpBig animated animated" data-wow-delay="0.4s">
            <div class="pricing-top">
              <h4>Professional</h4>
            </div>
            <div class="pricing-bottom">
              <h5>$ 15.99 <span>P/M</span></h5>
                <ul>
                  <li>5 GB Storage</li>
                  <li>100 Email Accounts</li>
                  <li>Maximum Speed</li>
                  <li>Advanced DNS Control</li>
                  <li>Unlimited Bandwith</li>
                  <li>24/7 Support</li>
                </ul>
                <a href="#" class="button1 hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal1">Buy Now</a>
            </div>
          </div>
          <div class="col-md-3 pricing-grid wow fadeInRight animated" data-wow-delay=".5s">
            <div class="pricing-top">
              <h4>Advanced</h4>
            </div>
            <div class="pricing-bottom">
              <h5>$ 15.99 <span>P/M</span></h5>
                <ul>
                  <li>5 GB Storage</li>
                  <li>100 Email Accounts</li>
                  <li>Maximum Speed</li>
                  <li>Advanced DNS Control</li>
                  <li>Unlimited Bandwith</li>
                  <li>24/7 Support</li>
                </ul>
                <a href="#" class="button1 hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal1">Buy Now</a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!--contact-->
      
      <div class="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111158.7786017955!2d-98.41537196214382!3d29.466423974600172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865cf37f0f75b277%3A0x8804d859992a3c72!2sBusiness+Park%2C+San+Antonio%2C+TX+78218%2C+USA!5e0!3m2!1sen!2sin!4v1456322209100"></iframe>
      </div>
      <div class="contact-section" id="contact">
        <div class="container">
          <h3>Contact</h3>
          <div class="contact-grids">
            <div class="col-md-6 contact-grid wow fadeInLeft animated animated" data-wow-delay="0.4s">
              <h4>Contact Info</h4>
              <div class="info-detail">
                    <ul><li><i class="glyphicon glyphicon-calendar"></i><strong>Monday - Friday : </strong> 9:30 AM to 6:30 PM</li></ul>
                    <ul><li><i class="glyphicon glyphicon-map-marker"></i><strong>Address : </strong> 786 Sme Street , New Jersey, US, dc 999</li></ul>
                    <ul><li><i class="glyphicon glyphicon-phone"></i><strong>Phone : </strong> (01) 0200-123-4567</li></ul>
                    <ul><li><i class="glyphicon glyphicon-print"></i><strong>Fax : </strong> (01) 0091-789-456100</li></ul>
                    <ul><li><i class="glyphicon glyphicon-envelope"></i><strong>Email : </strong> <a href="mailto:example@mail.com">example@mail.com</a></li></ul>
                  </div>
            </div>
            <div class="col-md-6 contact-grid1 wow fadeInRight animated animated" data-wow-delay="0.4s">
            <h4>Leave Us A Message</h4>
              <form>
                <input type="text" placeholder="Name" required="">
                <input type="text" class="mail" placeholder="Email" required="">
                <input type="text"  placeholder="Phone" required="">
                <textarea placeholder="Message"></textarea>
                <input type="submit" value="Submit">
              </form>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    <!--contact-->
  <div class="footer-section wow fadeInLeft animated animated" data-wow-delay="0.4s">
    <div class="container">
      <div class="copy">
        <p>&copy; 2017  Fix Duties . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
      </div>
    </div>
  </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
              <div class="compose-grids">
                  <div class="payment-online-form-left">
                      <form>
                        <h4><span class="shipping"> </span>Shipping Details</h4>
                        <ul>
                          <li><input class="text-box-dark" type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}"></li>
                          <li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
                        </ul>
                        <ul>
                          <li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
                          <li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
                        </ul>
                        <ul>
                          <li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
                          <li><input class="text-box-dark" type="text" value="Pin Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pin Code';}"></li>
                          
                        </ul>
                        <div class="clearfix"></div>
                        <h4 class="paymenthead"><span class="payment"></span>Payment Details</h4>
                        <div class="clearfix"></div>
                      <ul class="payment-type">
                        <li><span class="col_checkbox">
                          <input id="3" class="css-checkbox1" type="checkbox">
                          <label for="3" class="css-label1"></label>
                          <a class="visa" href="#"></a>
                          </span>                       
                        </li>
                        <li>
                          <span class="col_checkbox">
                            <input id="4" class="css-checkbox2" type="checkbox">
                            <label for="4" class="css-label2"></label>
                            <a class="paypal" href="#"></a>
                          </span>
                        </li>
                      </ul>
                        <ul>
                          <li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
                          <li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
                        
                        </ul>
                        <ul>
                          <li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
                          <li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
                        
                        </ul>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Process order</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
