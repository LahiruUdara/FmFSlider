
<link href="/dist/owl/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<script src="/dist/owl/assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<link href="/dist/owl/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
<script src="/dist/owl/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="/dist/owl/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<link href="/dist/owl/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
<link href="/dist/owl/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="/dist/owl/assets/css/bootstrapTheme.css" rel="stylesheet" type="text/css"/>

<style>
    #owl-demo .item{
  background: whitesmoke;
  padding: 30px 0px;
  margin: 10px;
  color: #ccccff;
 -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
  width:365px;
}
.customNavigation{
  text-align: center;
}
//use styles below to disable ugly selection
.customNavigation a{
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
    </style>
    <div id="owl-demo" class="owl-carousel owl-theme" >
       <?php
       
          // $hotel_info = load_xml_file('xml_cache/offers_and_promotions/offers_and_promo.xml');
            $hotel_info_array = array();
             
             shuffle($hotel_info_array);
             
             foreach ($hotel_info as $hotel)
             {
        // add array data to slider               
                   $name = str_replace(' ', '-',$hotel['hotel_name']);
                   
                echo' <div class=" col-md-12 col-sm-10 deal-items-ui loading-pause-ui" style="hight:218px;">
                          <div class="thumbnail">                        
                            <a href="'.$name.'">
                                <img style="min-height: 146px" src="http://dev.kbtpl.com'.$hotel['homepage_image'].'">
                            </a>

                            <div class="caption">
                                <div class="col-md-12 deal-meta "> 
                                    <a href='.$name.'>
                                        <h6 id="thumbnail-label" style="color: #0F3666;  font-weight: bold; text-align: center">
                                             '.$hotel['hotel_name'].'
                                        </h6>
                                    </a>
                                    <div class="col-md-6 col-sm-8" style="color:#333 "  font-size: 14px;>
                                        <p style="text-decoration: line-through;
                                           color: #F00;"> <span style="fon">LKR '.$hotel['regular_price'].' </span></p>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-8" style="color:#333  font-size: 14px;">
                                        LKR <span>  '.$hotel['Sub'].'  </span>
                                    </div>
                                    <div class=" clearfix"></div>

                                    <!--<hr/>-->
                                </div>
                                <div class="col-md-12" style="padding-top: 5px;">                                
                                                                   
                                     <div class="col-md-6">   <a href="'.$name.'" class="btn light_btn" role="button">
                                           <span style="color: #fff; font-weight: bold">  More details </span>   
                                     </a> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>                     
                    </div>';
                   
                                                       
             }

       
        ?>
    </div>
     
    <div class="customNavigation">
      <a class="btn prev">Previous</a>
      <a class="btn next">Next</a>
    </div>
    <script>
        

    $(document).ready(function() {
     
      var owl = $("#owl-demo");
     
      owl.owlCarousel({
          items : 5, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });
     
      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      });
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      });
     
    });
        </script>

