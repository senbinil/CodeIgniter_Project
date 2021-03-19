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
       
       /* #step-2{
           display: none;
       }
       .panel{
           text-align: center;
           margin: auto;
       }
       .panel-heading{
           margin-bottom: 30px;
       } */
       input[type="text"]::placeholder {  
                  
                  /* Firefox, Chrome, Opera */ 
                  text-align: right; 
              } 
    </style>
</head>
<body >
 
    <header class="container-fluid">
        <span class="hash"><i class="fa fa-briefcase" aria-hidden="true"></i>
        </span>Dashboard
    </header>

     <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
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
        <div class="panel  setup-content my-4" id="step-1">
            <div class="panel-heading d-flex justify-content-center">
                 <h3 class="panel-title">Student</h3>
                
            </div>
            <div class="panel-body ">
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                    <input type="text" required="required" class="form-control text-center col-sm-4" placeholder="Admission ID" />
                    </div>
                </div>
        
                <button class="btn btn-primary btn-sm " type="button">Search</button>

            </div>
            <div class="mt-4  d-block float-right">
            <a onclick="myFn()" class="btn btn-light btn-sm" >Employee ?</a>
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
        
                <button class="btn btn-primary btn-sm"  type="button">Search</button>
            </div>
            <div class="mt-4  d-block float-right">
            <a onclick="myFn()" class="btn btn-light btn-sm">Student ?</a>
            </div>
        </div>
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
 </script> -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold"  id="exampleModalLongTitle"><?php if(isset($admin_no)) echo "Student Found : $admin_no"; else echo "nothing ";  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form action="">
            <div class="row">
            <div class="col-sm-3">
            <label for="Fname" class="col-form-label">First Name</label>
            </div>
            <div class="col">
            <input type="text" class="form-control" value="<?=$fname?>" placeholder="First Name" disabled >
            </div>
            </div>

            <div class="row my-2">
            <div class="col-sm-3">
            <label for="lnane" class="col-form-label">Last Name</label>
            </div>
            <div class="col">
            <input type="text" class="form-control" value="<?=$lname?>" placeholder="Last Name" disabled >
            </div>
            </div>
            
            <div class="row my-2">
            <div class="col-sm-3">
            <label for="DOB" class="col-form-label">Date Of Birth</label>
            </div>
            <div class="col-sm-4">
            <input type="text" class="form-control" value="<?=$dob?>" placeholder="DOB" disabled >
            </div>
            <div class="col-sm-3">
            <label for="Blood" class="col-form-label">Blood Group</label>
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Blood Group" value="<?=$blood_group?>">
            </div>
            </div>  

            <div class="row my-2">
            <div class="col-sm-2">
            <label for="DOB" class="col-form-label">Address</label>
            </div>
            <div class="col">
            <textarea type="text" class="form-control" disabled ><?=$address?></textarea>
            </div>
            </div>


            <div class="row my-2">
            <div class="col-sm-2">
            <label for="state" class="col-form-label">State</label>
            </div>
            <div class="col-sm-3">
            <input type="text" class="form-control" value="<?=$state?>" disabled>
            </div>
            <div class="col-sm-2">
            <label for="City" class="col-form-label">City</label>
            </div>
            <div class="col">
            <input type="text" class="form-control" value="<?=$city?>" disabled>
            </div>
            </div>

            <div class="row my-2">
            <div class="col-sm-2">
            <label for="Code" class="col-form-label">Zip Code</label>
            </div>
            <div class="col-sm-3">
            <input type="text" class="form-control" value="<?=$zip_code?>" disabled>
            </div>
            <div class="col-sm-2">
            <label for="gender" class="col-form-label">Gender</label>
            </div>
            <div class="col">
            <input type="text" class="form-control" value="<?=$gender?>" disabled>
            </div>
            </div>

        </form>


      </div>

      <div class="modal-footer">
       <a href="/admin-home"> <button type="button" class="btn btn-secondary" >Close</button></a>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script>

$(window).on('load',function(){
     // delay in milliseconds
    
    setTimeout(function(){
        $('#myModal').modal('show');
    });
});

function onClk()
{
    window.location.replace("/admin-home");

}
</script>
</body>
</html>