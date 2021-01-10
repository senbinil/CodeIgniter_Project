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
     .vl
        {
            border-left:6px solid black;
            height: 200px;
        }
        @media only screen and (max-width:600px){
            .vl{
                display: none;
            }
        }
        body{
            font-family: 'Montserrat',sans-serif;
        }
       
       #step-2{
           display: none;
       }
       .panel{
           text-align: center;
           margin: auto;
       }
       .panel-heading{
           margin-bottom: 30px;
       }
    </style>
</head>
<body >
 
    <header class="container-fluid">
        <span class="hash"><i class="fa fa-briefcase" aria-hidden="true"></i>
        </span>Dashboard
    </header>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <!-- <a  class="navbar-brand">Welcome back <span class="font-weight-bold text-capitalize"></span></a> -->
        
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  btn btn-danger mx-3 my-1">
                        <a class="nav-link text-white" href="#">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger  mx-4 my-1">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                </ul>
           
        </div>
    </nav>


<div class="container">
         <form role="form">
        <div class="panel setup-content my-4" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Student</h3>
            </div>
            <div class="panel-body ">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                    <input type="text" required="required" class="form-control text-center col-sm-4" placeholder="Admission ID" />

                    </div>
                </div>
        
                <button class="btn btn-primary " onclick="myFn()" type="button">Search</button>
            </div>
        </div>
        
        <div class="panel  setup-content my-4 " id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Employee</h3>
            </div>
            <div class="panel-body ">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                    <input type="text" required="required" class="form-control text-center col-sm-4" placeholder="Employee ID" />

                    </div>
                </div>
        
                <button class="btn btn-primary " onclick="myFn()" type="button">Search</button>
            </div>
        </div>
        <hr>
         </form>
    

        
 </div>

 <script>
    function myFn() {
        var y = document.getElementById("step-1");

  var x = document.getElementById("step-2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";

  } else {
    x.style.display = "none";
    y.style.display = "block";

  }
}

 </script>
</body>
</html>