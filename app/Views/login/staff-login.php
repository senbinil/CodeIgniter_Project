<!DOCTYPE html>
<html lang="en">
<head>


<link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">


<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <style>
 
    
     .btnsub{
    border: none;
    border-radius: 1.5rem;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
         font-size: large;
         
     }

     select,input{
         text-align: center;
     }
     
    

    </style>
</head>
<body>
<div class="header container pt-4 ">
        <h1 align="center">Staff Login</h1>
    </div>
    <!-- Main navigation -->
    <div class="container my-5 px-0 z-depth-1">
   



<nav aria-label="breadcrumb" class="">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login</li>
  </ol>
</nav>
        <!--Section: Content-->
        <section class=" text-center" style="background:#99dde8; padding-top:80px; padding-bottom:80px; margin-top:100px;" >
         
      
        
      
            <div class="row" >
              <div class="col-sm-8 col-md-4 col-lg-5 bg-white border border-rounded mx-auto mx-xs-3" >
                <!-- Material form login -->
                <div class=" py-5  " >
      
                  <!--Card content-->
                  <div class="" >
      
                    <!-- Form -->
                    <form action="/login/stafflogin" class="text-center py-5" method="POST" style="color: #757575;">

      
                      <!-- Name -->
                      <input type="text" id="defaultSubscriptionFormPassword"   maxlength="6" minlength="4"  autocomplete="off" onkeypress="return onlyNumberKey(event)" name="emp_id" required class="form-control mb-4" placeholder="Username">
      
                      <div class="input-group">
                      <input type="password" class="form-control pwd" name="password" placeholder="Password">

                        <span class="input-group-btn">
                            <button class="btn btn-light reveal" title="Show Password" type="button"><i class="fa fa-eye"></i></button>
                         </span>  
                      </div>
                      <div class="">
                   <label for="status" name="stat" class=" text-danger  py-2"><?php if(session()->getFlashdata('msg')) echo session()->getFlashdata('msg') ?></label>
                    </span>
                </div>
                      <small id="passwordHelpBlock" class="form-text mt-3 text-right blue-text">
                        <a href="/precovery/staff-recovery">Recover Password</a>
                      </small>
      
                      <div class="text-center">
                       <input type="submit" class="btn btn-outline-danger btn-lg btn-rounded my-4 waves-effect" value="login">
                      </div>
      
                
                    <!-- Form -->
      
                  </div>
      
                </div>
                <!-- Material form login -->
              </div>
            </div>
      
          </form>
      
        </section>
        <!--Section: Content-->
      
      
      </div>
      
      <section class="container">
        <div class="note">

<h6 class="lead">Note</h6>
            <p>Don't Know Password ? Please Set Your Password <a href="setpass.php">Here</a></p>
        </div>
<script>


function onlyNumberKey(evt) { 
          
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 

      $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script>


      </section>
</body>
</html>