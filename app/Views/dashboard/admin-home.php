
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
         <a  class="navbar-brand">Welcome back <span class="font-weight-bold text-capitalize"><?= $username;?></span></a>
        
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


<!-- 




   
    
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
       <li class="col-sm-3"><a href="">Message Center</a>
       </li>
        <li class="col-sm-3"><a href="">Fee Collector</a></li>
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
        <li class="col-sm-3"><a href="admin-home/global-search"> Global Search</a></li>
        <li class="col-sm-3"><a href="bulletin.php">Bulletin update</a></li>
        <li class="col-sm-3"><a href="suginbox.php">Suggestion Box</a></li>

    </div>
    </ol>

</div>
  
 -->
<!-- 

<nav class="navbar navbar-expand-lg navbar-primary  py-4 bg-light">
        <a href="#" class="navbar-brand font-weight-light"><span class="brand">Senk.in</span> </a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navcontent" aria-controls="#navcontent" aria-expanded="false" aria-label="Toggle">
            <span class="navbar-toggler-icon  "></span>
        </button>
        <div class="collapse  navbar-collapse" id="navcontent">
            <ul class="navbar-nav ml-auto font-weight-light">
                <li class="nav-item active">
                    <a href="#" class="nav-link">DashBoard Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav><hr> -->


    <section>
    <div id="accordion mb-4">
        <div class="card m-2">
            <div class="card-header bg-danger text-white" id="item0">
                <div class="d-flex ">
                    <h5 class=""> <i class="fa fa-cogs"></i> Control Center</h5>
                    <span class=" ml-auto " data-toggle="collapse" data-target="#item0sub" aria-expanded="true" aria-controls="item0sub">
                        <i class="fa fa-window-minimize" title="Minimize"></i>
                    </span>
                </div>
            </div>
            <div id="item0sub">
                <div class="card-body bg-light">
                    <div class="row">
                        <!-- <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Search</a>
                        </div> -->
                        <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Bulletin updates</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Resources</a>
                        </div> 
                         <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Suggestion Inbox </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div id="accordion">
        <div class="card m-2">
            <div class="card-header bg-secondary text-white" id="item1">
                <div class="d-flex ">
                    <h5 class=> <i class="fa fa-user"></i>     Students Corner</h5>
                    <span class=" ml-auto " data-toggle="collapse" data-target="#item1sub" aria-expanded="true" aria-controls="item1sub">
                        <i class="fa fa-window-minimize" title="Minimize"></i>
                    </span>
                </div>
            </div>
            <div id="item1sub">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <a href="admin-home/student-enroll" class="nav-link">Enrollment</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="admin-home/feeupdate" class="nav-link">Fee Collector</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="admin-home/message-center" class="nav-link">Message Center</a>
                        </div> 
                         
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
<div class=" mx-1 row">
    <div class="col-md-6">
        <div class="card">
        <div class="card-body bg-danger text-white">
             <h5 class="card-title"><i class="fa fa-rocket"></i>Fast Track</h5><hr class="bg-white">

            <form action="dashboard/Search/student" class="form mx-4" method="post">
                <div class="row">
                    <label for="adminno" class="col-form-label">Admission </label>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" name="student_id" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Search" class="form-control btn btn-dark btn-sm">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <div class="card-body bg-danger text-white">
             <h5 class="card-title"><i class="fa fa-rocket"></i>  Fast Track</h5><hr class="bg-white">
            <form action="dashboard/Search/staff" class="form mx-4" method="post">
                <div class="row">
                    <label for="adminno" class="col-form-label">Employee </label>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" name="emp_id" class="emp_id" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Search" class="form-control btn btn-dark btn-sm">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




<span class="px-3"></span>
<div class="row mx-1">
    <div class="col-md-6 card2">
        <div class="card">
          <div class="card-header d-flex bg-info text-white ">
            <h5 class="card-title">Suggestion Inbox </span></h5>
            <span class="ml-auto"><i class="fa fa-comment-o"></i>
          </div>
                <div class="card-body  bg-info text-white">
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, itaque fuga? Eum ratione quod aperiam quisquam fuga nulla distinctio consectetur vel, iste ipsam sunt facere vero cumque molestiae fugiat iure!</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 card2">
        <div class="card">
        <div class="card-body bg-primary text-white">
                <h5 class="card-title">Recent Fee Payment</h5><hr class="bg-white">
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, itaque fuga? Eum ratione quod aperiam quisquam fuga nulla distinctio consectetur vel, iste ipsam sunt facere vero cumque molestiae fugiat iure!</p>
            </div>
        </div>
    </div>
</div>
<section>
    <div id="accordion mb-4">
        <div class="card m-2">
            <div class="card-header bg-dark text-white" id="item2">
                <div class="d-flex ">
                    <h5 class=>Recent  Request</h5>
                    <span class=" ml-auto " data-toggle="collapse" data-target="#item3sub" aria-expanded="true" aria-controls="item3sub">
                       <span class="mr-4 more font-weight-light"> <a href="#">More</a> </span>
                        <i class="fa fa-window-minimize" title="Minimize"></i>
                    </span>
                </div>
            </div>
            <div id="item3sub">
                <div class="card-body bg-light">
                    <div class="row  table-responsive-md">
                        <table class="table">
                            <caption>Admission request</caption>
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><span><button class="btn  btn-sm btn-primary mr-1 pb-1">View More</button> <button class="btn btn-sm btn-danger">Delete</button> </span></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td><span><button class="btn  btn-sm btn-primary mr-1">View More</button> <button class="btn btn-sm btn-danger">Delete</button> </span></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td><span><button class="btn  btn-sm btn-primary mr-1">View More</button> <button class="btn btn-sm btn-danger">Delete</button> </span></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of student section --> <hr>
<section>
    <div id="accordion mb-4">
        <div class="card m-2">
            <div class="card-header bg-danger text-white" id="item2">
                <div class="d-flex ">
                    <h5 class=> <i class="fa fa-building"></i> Staff Corner</h5>
                    <span class=" ml-auto " data-toggle="collapse" data-target="#item2sub" aria-expanded="true" aria-controls="item2sub">
                        <i class="fa fa-window-minimize" title="Minimize"></i>
                    </span>
                </div>
            </div>
            <div id="item2sub">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <a href="admin-home/staff-enroll" class="nav-link">Enrollment</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Salary</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">M</a>
                        </div> 
                         <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Suggestion Inbox </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?=base_url()?>/asset/js/popper.min.js"></script>
<script>
 $(document).ready(function() {

window.history.pushState(null, "", window.location.href);        

window.onpopstate = function() {

    window.history.pushState(null, "", window.location.href);

};

});
</script>
</body>
</html>

