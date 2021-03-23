
    <script src="/asset/js/jquery.smartmarquee.js"></script>
          <header class=" container-fluid extra  " style="margin-top: 50px;">
            <div class="text-block jumbotron-fluid bg-transparent ">
              <span class="  display-3 ">College Of Applied Science, Perissery</span>
              <p class="lead mb-5 text-white-50">
              <a href="about" class="btn btn-dark btn-lg">Read More</a>
            </p>
            </div>
            <canvas class="background"></canvas>
          </header>
        
    
    
          <div class="container container-fluid-sm cont" >
          <div class="row bg-transparent p-1" >
            
            <div class="col-sm-8 card border border-light  text-white py-4" style="background-color: #4158D0;background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
              <section>
                <h2>Upcoming Events</h2><br>
                <hr class="bg-white">
                <div class="subcontent">
                 <div class="row">
                                <div class="col-md-6 ">
                                    <div class="feature rounded-icon">
                                        <h3 class="feature-title "><b>LAKSHAYA 2020</b> </h3>
                                        <p class="pb-4">College Fest 20/06/2020 </p>
                                    </div>
    
                                    <div class="feature rounded-icon">
                    
                                        <h3 class="feature-title"> <b>Magazine Release</b> </h3>
                                        <p>Magazine Release on 22/05/2020</p>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="feature rounded-icon">
                                        <h3 class="feature-title"><b>Career Guidance </b></h3>
                                        <p class="pb-4">Career guidance class for BSC CS on 14/07/2020</p>
                                    </div>
    
                                    <div class="feature rounded-icon">
                                        <h3 class="feature-title"><b>Union Inaguration</b> </h3>
                                        <p>Union Inaguration on 03/08/2020</p>
                                    </div>
                                </div>
                            </div>
    
              </section>
            </div>
            <div class="col-sm-4 news border  border py-1 " style="overflow: hidden;">
          <div class=" bg-dark text-white " style="background-image: linear-gradient(to right, #FF512F 0%, #DD2476  51%, #FF512F  100%)">
            <h4 align="center">News</h4>
          </div>


          <div class="smartmarquee example  ">
    
          <ul class="container news-content  text-dark px-2" style="overflow:hidden;">
          <?php
            if (isset($msg)) {
              // output data of each row
              for($i=0;$i<count($msg) ;$i++)
              echo  '<li class="font-weight-bold card-body border bg-light" style="background-image: linear-gradient(to right, #1FA2FF 0%, #12D8FA  51%, #1FA2FF  100%);
                 text-align: center;
                 text-transform: uppercase;
                 transition: 0.5s;
                 background-size: 200% auto;
                 color: white;            
                 box-shadow: 0 0 20px #eee;
                 border-radius: 10px;
                 background-position: right center; /* change the direction of the change here */
                 color: #fff;
                 text-decoration: none;">'.$msg[$i]['msg'].'</li>';
            } else {
              echo "0 results";
          }
          ?>
          </ul>
          </div>

        </div>
        </div>
        
      
     
        <hr class="my-5  space"  >

        <div class="container text-white divider  mt-5" >
         <section class=" card px-1 py-1 border border-light  fadeIn" style="background-color: #4158D0;background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
          <div class="row">
            <div class="col-md-6">
              <img src="asset/img/idea.jpg"  class="img-fluid z-depth-1-half" alt="">
            </div>
            <div class="col-md-6 mb-4">
              <h3 class="h3 mb-3">Our Vision</h3>
              <p>To become a centre of excellence for students in education, training and research and to exceed student’s expectations by providing highest quality.</p>
              <p>Click  below to learn more about our college.</p>
              <!-- Main heading -->
  
              <hr class="bg-white">

            
              <div class="btn btn-primary text-white"><a href="/about" class="text-white text-decoration-none" >Read More</a></div>
            </div>
          </div>
         </section>
         <hr class="my-5">
         <section class="card  px-1 py-1" style="background-color: #4158D0;background-image: linear-gradient(122deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
           <h3 class="text-center mb-5">
             About
           </h3>
           <div class="row">
             
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 px-4">
  
              <!--First row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-code fa-2x text-blue"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Perfect Ambience</h5>
                  <p class="grey-text">Thanks to IHRD to provide us with a good college ambience .</p>
                  <hr class="bg-white">            <a href="collegegal.htm" class="btn btn-primary btn-md" >Check out</a>
  
                </div>
              </div>
              <!--/First row-->
  
              <div style="height:30px"></div>
  
              <!--Second row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-book fa-2x blue-text"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Empowering your dreams</h5>
                  <p class="grey-text">We Believe Everyone Has The Capacity To Succeed.We're here to help with your success
                  </p>
                </div>
              </div>
              <!--/Second row-->
  
              <div style="height:30px"></div>
  
              <!--Third row-->
              <div class="row">
                <div class="col-1 mr-3">
                  <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                </div>
                <div class="col-10">
                  <h5 class="feature-title">Lots of tutorials</h5>
                  <p class="grey-text">We care about the development of our Students. We have prepared numerous class, which allow you to learn
                    how to excel .</p>
                </div>
              </div>
              <!--/Third row-->
              </div>
              
              <div class="col-md-6 ">
                <img src="asset/img/gg.jpg" class="img-fluid hatpic rounded"  alt="">
              </div>
           </div>
           
         </section>
        </div>
    </div>
