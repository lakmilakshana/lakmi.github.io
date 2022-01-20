<?php
    require_once "initialize.php";
    if (isset($_GET['id'])){
        $listing = Listing::find_by_id($_GET['id']);

    }else{
        redirect_to('index.php');
    }

?>


<?php
    require_once "header.php";
?>

    <div class="overlay"  style="background-image: url(images/listingp.jpeg);" data-aos="fade" >

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <h1 style="color: white; font-weight: bolder;">Business Details</h1>



                </div>
            </div>
        </div>
    </div>


        <div class="container">

        <div class="row">
          <aside>
          
            <div class="signup">
              <div  class="d-block d-md-flex listing vertical" >
              <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white; height: 460px;">
               
                   
                 
               
                  <img src="images/72.JPG" style="width: 250px;" alt="Image" class="img-fluid mb-3">
                 
               
                 <div class="product-information"> <h4 style="font-weight: bolder;">Contact Info</h4><!--/product-information--> <br><i class="fa fa-location-arrow">  Addis Ababa</i>    ET<br>
                     <?php if (count($listing->phoneNumbers()) > 0 ){
//                       print_r($listing->phoneNumbers());
                       foreach ( $listing->phoneNumbers() as $number){
//                           print_r($number);
                           ?>

                           <a href="tell:<?= $number->number?>"><i class="fa fa-phone" style="padding-top: 4px;"> <?= $number->number?> </i></a> <br>
                           <?php
                       }
                   }else{
                       echo "<a href=\"#\"><i class=\"fa fa-phone\" style=\"padding-top: 4px;\"> there is no phone number</i></a> <br>";
                   }
                   ?>
                     <div class="grand_social">
             <ul class="social-icons">
                 <li>
                     <a target="_blank" href="https://<?= $listing->facebook?>">
                         <i class="fa fa-facebook"></i>
                     </a>
                 </li>
                     <li>
                         <a target="_blank" href="https://<?= $listing->twitter?>">
                             <i class="fa fa-twitter"> </i>
                         </a>
                     </li>
                 <li>
                     <a target="_blank" href="">
                         <i class="fa fa-google-plus">              </i>
                     </a>
                 </li>
                     <li >
                         <a  target="_blank" href="#">
                             <i class="fa fa-pinterest">            </i>
                         </a>
                     </li>
                 <li>
                     <a target="_blank" href="https://<?= $listing->linkedin?>">
                         <i class="fa fa-linkedin">              </i>
                     </a>
                 </li>
                     <li>
                         <a target="_blank" href="#">
                             <i class="fa fa-dribbble">             </i>
                         </a>
                     </li>
             </ul>
             
             
             
             </div></div>
             
               </div>
             
            </div>
          </div>

<?php if (true || isset($user) && $listing->owner_id === $user->id) {?>
              <div class="signup">
                  <div  class="d-block d-md-flex listing vertical" >
                      <div style="border-color: rgb(129, 121, 121); border-radius:5px; background-color: white; height: 300px;">

                          <div class="product-information">
                              <h2 style="font-weight: bolder;">Actions</h2>
                              <a href="#"><i class="fa fa-pen-square" style="padding-top: 4px;">  Edit this listing</i></a> <br>
                              <a href="#"><i class="fas fa-trash-alt" style="padding-top: 4px;">  Delete this listing</i></a> <br>
                          </div>
                      </div>
                  </div>
              </div>
<?php } ?>
          </aside>
         
          <section1>
            
            <div id="ratnav" style="z-index: 100; " class="signup">
              <div class="d-block d-md-flex listing vertical">
              <div  class="col-lg-41 ">


                  <div style="height: 150px; "  class="lh-content">
                 
                 
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3 contenteditable="true"></h3><a href="listings-single.php"><?= $listing->company_name?></a></h3>
                  
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    
                    <span class="review">(3 Reviews)</span>
                  </p>
                  
                  <div id="ratinglist">
                     <ul>
                    
                    
                      <li><a href="#"><span class="fa fa-map-marker"></span> Get Direction</a></li> 
                      <li><a href="#"><span class="fa fa-phone" ></span> Call now</a></li> 
                      <li><a href="#"><span class="fa fa-envelope" ></span> Sent-email</a></li> 
                      <li>  <a href="#"><span class="fa fa-share" ></span>Share</a></li> 
                      <li>  <a href="#"><span class="fa fa-comments" ></span>Leave a review</a></li> 
                      
                  </ul>
                </div>
                </div>
              </div>
            </div> 
          </div>
            <br/>
            <div class="d-block d-md-flex listing vertical">
            <div  style="margin-left: 15px; background-color: white;">
              <h4 ><span class="fa fa-bars"></span> Business Detail </h4>
              <p style="font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                  <?= $listing->company_description?>
              </p>


            </div>
            </div>
            <div class="d-block d-md-flex listing vertical">
              <div class="row">
              
                <div class="col-lg-7">
                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.5317151991608!2d38.73566861383485!3d9.015163593530454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85df461a3f2d%3A0x6637f10e1ad21e01!2sSoliana%20Commercial%20Center!5e0!3m2!1sen!2set!4v1582872908762!5m2!1sen!2set" width="350" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe></p>
              </div>
              <div class="col-lg-5">
                
        
                <div class="address">
                    <span class="icon-clock"></span>
                    <p><b>Mon</b>  Open 24 hours <br><b>Tue</b>   Open 24 hours <br><b>Wed</b>  Open 24 hours <br><b>Thu</b>  Open 24 hours <br><b>Fri</b>  Open 24 hours <br> <b>Sat</b>  Open 24 hours <br><b>Sun</b>  Open 24 hours <br>
                        <span style="color: green;" class="open-now"><b>OPEN NOW</b></span></p>
                </div>
            
               </div>
              </div>
              </div>

            <h4 style="text-align: center" >DES Products</h4>
                  
              <div  class="row">
             
                  
                   
          
                  <div  class="col-lg-12" >
                    <div  class="d-block d-md-flex listing vertical">
                    <div class="slide-one-item home-slider owl-carousel">
                      <div><img style="height: 400px;" src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                      <div><img style="height: 400px;"  src="images/5867.jpg" alt="Image" class="img-fluid rounded"></div>
                    </div>
                    </div>
                   
                  </div>
                  
              </div>
              <div class="col-lg-41" >
                <div  class="d-block d-md-flex listing vertical" >
                <div class="">
                  <h4 style=" padding-left: 11px; "> Product &amp; Services  </h4>
                  <ul>
                      <?php foreach ($listing->products() as $product) {?>

                     <li>-<?= $product->title?></li>
                      <?php } ?>
                      <?php foreach ($listing->services() as $service) {?>

                          <li>-<?= $service->title?></li>
                      <?php } ?>

                </ul>
                </div>
              </div>
            </div>
           

            <div class="d-block d-md-flex listing vertical">
            <div class="row">  
        
              <div class="col-lg-2" >
                
              <img style="height: 40px;" src="images/pers.jpg" alt="Image" class="img-fluid rounded">
  
              </div>
              <div class="col-lg-3" >
                <p>Asheber Chan.</p>
                <p>
                <span class="icon-star text-warning"></span>
                <span class="review">15 reviews</span></p>
              </div>
              <div class="col-lg-7" >
             
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  
                  <span class="review">3/17/2019</span>
                </p>
                            
                  <p>friendly , responsive and good at the work</p>
                  <p>friendly , responsive and good at the design</p>
                  <p>very friendly and responsive Job</p>
                  
                  <li id="spacerev" class="social-icons" class="btn-outline" ><a   id="review" href="#"   class="fas fa-lightbulb">Useful</a> </li><li id="spacerev"><a id="review" href="#"  class="fas fa-grin-alt">Funny</a></li><li id="spacerev"><a id="review" href="#" class="fas fa-surprise">Cool</a> </li>
              
              
            </div>
          </div>
            </div>
            <div class="d-block d-md-flex listing vertical">
              <div class="row">  
          
                <div class="col-lg-2" >
                  
                <img style="height: 40px;" src="images/pers.jpg" alt="Image" class="img-fluid rounded">
    
                </div>
                <div class="col-lg-3" >
                  <p>Asheber Chan.</p>
                  <p>
                  <span class="icon-star text-warning"></span>
                  <span class="review">15 reviews</span></p>
                </div>
                <div class="col-lg-7" >
               
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    
                    <span class="review">3/17/2019</span>
                  </p>
                              
                    <p>friendly , responsive and good at the work</p>
                    <p>friendly , responsive and good at the design</p>
                    <p>very friendly and responsive Job</p>
                    
                    <li id="spacerev" class="social-icons" ><a   id="review" href="#"   class="fas fa-lightbulb">Useful</a> </li><li id="spacerev"><a id="review" href="#"  class="fas fa-grin-alt">Funny</a></li><li id="spacerev"><a id="review" href="#" class="fas fa-surprise">Cool</a> </li>
                
                
              </div>
            </div>
              </div>
              <div class="d-block d-md-flex listing vertical">
                <div class="row">  
            
                  <div class="col-lg-2" >
                    
                  <img style="height: 40px;" src="images/pers.jpg" alt="Image" class="img-fluid rounded">
      
                  </div>
                  <div class="col-lg-3" >
                    <p>Asheber Chan.</p>
                    <p>
                    <span class="icon-star text-warning"></span>
                    <span class="review">15 reviews</span></p>
                  </div>
                  <div class="col-lg-7" >
                 
                    <p class="mb-0">
                      <span class="icon-star text-warning"></span>
                      <span class="icon-star text-warning"></span>
                      <span class="icon-star text-warning"></span>
                      <span class="icon-star text-warning"></span>
                      <span class="icon-star text-warning"></span>
                      
                      <span class="review">3/17/2019</span>
                    </p>
                                
                      <p>friendly , responsive and good at the work</p>
                      <p>friendly , responsive and good at the design</p>
                      <p>very friendly and responsive Job</p>
                      
                      <li id="spacerev" class="social-icons"><a   id="review" href="#"   class="fas fa-lightbulb">Useful</a> </li><li id="spacerev"><a id="review" href="#"  class="fas fa-grin-alt">Funny</a></li><li id="spacerev"><a id="review" href="#" class="fas fa-surprise">Cool</a> </li>
                  
                  
                </div>
              </div>
                </div>
                <div class="d-block d-md-flex listing vertical">
                  <div class="row">  
              
                    <div class="col-lg-2" >
                      
                    <img style="height: 40px;" src="images/pers.jpg" alt="Image" class="img-fluid rounded">
        
                    </div>
                    <div class="col-lg-3" >
                      <p>Asheber Chan.</p>
                      <p>
                      <span class="icon-star text-warning"></span>
                      <span class="review">15 reviews</span></p>
                    </div>
                    <div class="col-lg-7" >
                   
                      <p class="mb-0">
                        <span class="icon-star text-warning"></span>
                        <span class="icon-star text-warning"></span>
                        <span class="icon-star text-warning"></span>
                        <span class="icon-star text-warning"></span>
                        <span class="icon-star text-warning"></span>
                        
                        <span class="review">3/17/2019</span>
                      </p>
                                  
                        <p>friendly , responsive and good at the work</p>
                        <p>friendly , responsive and good at the design</p>
                        <p>very friendly and responsive Job</p>
                        
                        <li id="spacerev" class="social-icons"><a   id="review" href="#"   class="fas fa-lightbulb">Useful</a> </li><li id="spacerev"><a id="review" href="#"  class="fas fa-grin-alt">Funny</a></li><li id="spacerev"><a id="review" href="#" class="fas fa-surprise">Cool</a> </li>
                    
                    
                  </div>
                </div>
                  </div>
                  <div class="d-block d-md-flex listing vertical">
                    <div class="row">  
                
                      <div class="col-lg-2" >
                        
                      <img style="height: 40px;" src="images/pers.jpg" alt="Image" class="img-fluid rounded">
          
                      </div>
                      <div class="col-lg-3" >
                        <p>Asheber Chan.</p>
                        <p>
                        <span class="icon-star text-warning"></span>
                        <span class="review">15 reviews</span></p>
                      </div>
                      <div class="col-lg-7" >
                     
                        <p class="mb-0">
                          <span class="icon-star text-warning"></span>
                          <span class="icon-star text-warning"></span>
                          <span class="icon-star text-warning"></span>
                          <span class="icon-star text-warning"></span>
                          <span class="icon-star text-warning"></span>
                          
                          <span class="review">3/17/2019</span>
                        </p>
                                    
                          <p>friendly , responsive and good at the work</p>
                          <p>friendly , responsive and good at the design</p>
                          <p>very friendly and responsive Job</p>
                          
                          <li id="spacerev" class="social-icons"><a   id="review" href="#"   class="fas fa-lightbulb">Useful</a> </li><li id="spacerev"><a id="review" href="#"  class="fas fa-grin-alt">Funny</a></li><li id="spacerev"><a id="review" href="#" class="fas fa-surprise">Cool</a> </li>
                      
                      
                    </div>
                  </div>
                    </div>
                                
           
            
          </section1>
          
          <section>
            
            <div class="d-block d-md-flex listing vertical">
        
              <h2 style="font-weight: bolder; text-align: center;" >Directories</h2>
            
          
         
              <nav id="sidebar">
          
            <ul class="nav nav-pills  nav-sidefeatures">
              <div class="col-lg-41">
            <li>
              <a  href="catlists.php"><span class="fa fa-fire" ></span> Agriculture</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-picture-o" ></span> Amusement Parks</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-bars"></span> Appartments</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-cut" ></span> Architecture</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-money" ></span>Banking and Finance</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-music" ></span> Bars</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-book" ></span> Books & Mags</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-glass" ></span>Clubs</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-road" ></span> Commercial Places</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-desktop"></span> Computer and Internet</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-exclamation-triangle" ></span> Construction</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-book" ></span> Education</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-music" ></span>  Entertaiment</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-camera" ></span> Fashion</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-plus-square" ></span> Health & Medical</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-hospital-o" ></span> Hospitals</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-bars" ></span>   Hotels</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-heart-o" ></span> Jewellary</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-home" ></span> Lounges</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-gittip" ></span> Massage Therapy</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-medkit" ></span> Medical Spas</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-home" ></span> Musium</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-umbrella" ></span>Parks</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-leaf" ></span> Parks & Playgrounds</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-map-marker"></span> Places</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-circle-o" ></span> Playgrounds</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-print" ></span> Printing and publishing</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-building-o" ></span> RealEstates</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-home" ></span> Residential Plcaces</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-glass" ></span> Resturants</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-shopping-cart" ></span> Retail Stores</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-shopping-cart"></span> Shoppings</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-flag" ></span> Sport Clubs</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-phone" ></span> Telecommunications</a>
            </li>
            <li>
              <a href="#"><span class="fa fa-plane"></span> Travel and Tourism</a>
            </li>
          </div>
          </ul>
          
              </nav>
            
            </div>
          
    
          </section>

      </div>
     
        <div style="margin-bottom: 50px;" class="container">
          
          
          <div class="row">
            <div class="col-12">
              <h3 class="h3 mb-3 text-black">Related Listings</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-12  block-13">
              <div class="owl-carousel nonloop-block-13">
                
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                    <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
                <div class="d-block d-md-flex listing vertical">
                  <div style="border-color: rgb(29, 28, 28); border-radius:5px; background-color: white" >
            
                    <img src="images/72.jpg" class="img-thumbnail rounded-circle" style=" margin-left: 60px; width: 120px; height: 120px;  ">
                    
                  
                  
                  <div class="text p-4" >
                    <h3 class="h5 text-black" style="font-weight: bold; "><a href="listings-single.php">DES General Trading PLC</a></h3>
                    <span style="font-weight: bolder; font-size: small;" class="category ">Listed in <a href="#"> Agriculture</a></span>
                    <br/>
                    <p class="mb-0" style="font-size: small; font-family: Arial, Helvetica, sans-serif;" >DES General Trading Private Limited Company ....</p>
                    <br/>
                    <div style="font-size: medium; " class="row" >
                      <div class="fa fa-location-arrow "style="margin-right: 15px"> Addis Ababa, ET</div> <div class="fa fa-phone" style="margin-right: 15px">0925001221</div> <a href="#" class="fa fa-globe">Vist website</a>
                    </div> 
                  
                  
                  </div>
                  <br>
                  
                  </div>
                </div>
  
              
                
            </div>
  
  
          </div>
        </div>
      </div>
  
      </div>
      
     <?php require_once "footer.php";