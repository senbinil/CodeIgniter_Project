<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js" ></script>
    <link href="asset/css/bootstrap.css" rel="stylesheet" >
    
    <link rel="stylesheet" href="asset/css/admin-log.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg  navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CASP</a>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="nav navbar-nav  ml-auto">
                    <li class="nav-item active   mx-2 my-1">
                       <a class="nav-link " href="home"> <span><i class="fa fa-home"></i></span> Home</a>
                    </li>
                    <li class="nav-item  active  mx-2 my-1">
                        <a class="nav-link " href="exlog.php">Student login</a>
                    </li>
                    <li class="nav-item  active  mx-2 my-1">
                        <a class="nav-link " href="#">Staff login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="limiter">
        <div class="container-login10">
            <div class="wrap-login10 row">
            <div class="login10-pic  col-md-6 d-block ">
                <!-- <img src="asset/img/admin-log.jpg" alt="IMG"> -->
            </div>
            <form class="login10-form" action="login/auth" method="POST">
                <span class="login10-form-title">College login</span>
        
                <div class="wrap-input10">
                    <input type="text"   class="input10" name="admin_username" autocomplete="off" placeholder="Username" id="">
                <span class="focus-input10"></span>
                <span class="symbol-input10">
                    <i class="fa fa-user" aria-hidden="false"></i>
                </span>
                </div>
        
                <div class="wrap-input10">
                    <input type="password"  class="input10" name="admin_password" placeholder="Password" id="">
                    <span class="focus-input10"></span>
                    <span class="symbol-input10">
                        <i class="fa fa-lock" aria-hidden="false"></i>
                    </span>
                </div>
                <!-- Login Status -->
                <div class="">
                   <label for="status" name="stat" class=" text-danger ml-5"><?php if(session()->getFlashdata('msg')) echo session()->getFlashdata('msg') ?></label>
                    </span>
                </div>
                <div class="container-login10-form-btn">
                    <input  type="submit" class="login10-form-btn"   value="login">
                </div>
                <div class="text-center " style="padding-top: 12px;"><p class="txt1 px-1 " style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">Forgot Username/Password?</p></div>
              
            </form>
        </div>
        </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HELP DESK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <h6 class="text-center col-sm-12">Forgot Password ?</h6><hr class="col-sm-12">
                <p class="col-sm-12 py-3">
                    So you have forgotten an important password ? Ok , to reset your password please contact college office or head of institution with supporting 
                    documents , if the details provided found genuine you will get new password from college via a post or can collect from college office.Thank you
                </p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>