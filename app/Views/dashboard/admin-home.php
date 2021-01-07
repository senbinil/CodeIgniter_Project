
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
       
       background-image: url("img/adminhome.png");
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
<body class="bg-primary">
 
    <header class="container-fluid">
        <span class="hash"><i class="fa fa-briefcase" aria-hidden="true"></i>
        </span>Dashboard
    </header>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a  class="navbar-brand">Welcome back <span class="font-weight-bold text-capitalize"><?= $username;?></span></a>
        
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
<br>
<div class="container ">
<fieldset>
    <legend class="text-dark mb-4"><div class="head my-4">
    <h3 class="bg-info text-white text-center">
        Student Corner
    </h3>
</div></legend>
    <ol>
        <div class="row">
        <li class="col-sm-5"><a href="admin-home/student-enroll">Student Enrollment</a></li>
       <li class="col-sm-3"><a href="admin-home/message-center">Message Center</a>
       </li>
        <li class="col-sm-3"><a href="/admin-home/feeupdate">Fee Collector</a></li>
    </div>
</ol>
</fieldset>

<fieldset style="margin-top: 100px;">
    <legend>
    <div class="head my-4">
    <h3 class="bg-info text-white text-center">
        Staff Corner
    </h3></div>
    </legend>
    <ol>
        <div class="row">
        <li class="col-sm-3"><a href="staffenroll.php">Staff Enrollment</a></li>
        <li class="col-sm-3"><a href="staffsal.php">Salary Update</a></li>
    </div>
    </ol>
</fieldset>
<div class="head my-4">
    <h3 class="bg-info text-white text-center">
        Advance
    </h3>
</div>
    <ol>
        <div class="row">
        <li class="col-sm-3"><a href="global.php"> Global Search</a></li>
        <li class="col-sm-3"><a href="bulletin.php">Bulletin update</a></li>
        <li class="col-sm-3"><a href="suginbox.php">Suggestion Box</a></li>

    </div>
    </ol>

</div>
  
</body>
</html>