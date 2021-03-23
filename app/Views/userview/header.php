
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <title>DashBoard</title>
    
    <style>


body{
       
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;
      
   }
@media only screen and (max-width: 760px) {
  body {
    width: 100%;
    height: 100%;
  }
}
    
         body{
         font-family: 'Montserrat',sans-serif;
         width: 100%;
         color: white !important;
  
     }
  
     header{
        position: sticky;;
        font-size: 45px;
        width: 100%;
        padding-left: 1.5rem;
        line-height: 1.5;
        font-weight: 500;
        background-image: -webkit-linear-gradient(left, #3931af, #00c6ff);
        color: white;
        padding: 35px 22px;

     }
     li a{
         text-decoration: none !important;
         color: white !important;
     }
    </style>
</head>
<body>
<header class="container-fluid">
        <span class="hash"><i class="fa fa-briefcase" aria-hidden="true"></i>
        </span>Dashboard
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a  class="navbar-brand">Welcome back <span class="font-weight-bold text-capitalize"><?=$_SESSION['user_id'];?></span></a>
        
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item   mx-3 my-1">
                        <a class="nav-link text-dark " href="#">Dashboard Home</a>
                    </li>
                    <li class="nav-item  mx-4 my-1">
                        <a class="nav-link  text-dark" href="/logout">Logout</a>
                    </li>
                </ul>
           
        </div>
    </nav>

