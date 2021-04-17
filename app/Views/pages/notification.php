

  
<hr>
<section style="margin-top:150px; height:100vh;">
    <div class="container">
        <h5 align="Center">Recent Notifications</h5><hr class="mb-3">
        <div class="row">
            <div class="w-100">
                <ul class="list-group list-group-flush">
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="mr-2"><i class="fa fa-arrow-right"></i></span><small class= " font-weight-bold text-muted pr-3">20/12/2020</small><br>
                        <p class="text-justify bg-light"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium rerum, neque sint aspernatur aut distinctio ab tempore! Perferendis esse, autem aliquam dolore corporis sequi quae, culpa, dolorem facilis odit incidunt.</p>
                        <span class="btn btn-primary ml-3 d-block"> <i class="fa fa-download"></i>14</span>
                    </li> -->
                    <?php if(isset($msg)){
                        for($i=0;$i<count($msg);$i++)
                        echo'<li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="mr-2"><i class="fa fa-arrow-right"></i></span><small class= "font-weight-bold text-muted pr-3">'.$msg[$i]['time_log'].'</small><br>
                        <p class="text-justify bg-light">'.$msg[$i]['msg'].'</p>
                        <span class="btn btn-primary ml-3 d-block"> <i class="fa fa-flag"></i></span></li>';
                    } 
                    ?>
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                      Dapibus ac facilisis in
                      <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Morbi leo risus
                      <span class="badge badge-primary badge-pill">1</span>
                    </li> -->
                  </ul>
            </div>
        </div>
    </div>
</section>
