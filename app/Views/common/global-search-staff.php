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
    <link rel="stylesheet" href="/asset/css/common.css">

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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold"  id="exampleModalLongTitle"><?php if(isset($emp_id)) echo "Staff Found : $emp_id"; else echo "Not Found ";  ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">
<form action="">

<div class="row">
<div class="col-sm-3">
  <label for="name" class="col-form-label">Employee Name</label>
</div>
<div class="col">
  <input type="text" class="form-control" placeholder="<?=$emp_name?>" disabled>
</div>
</div>

<div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Apply Date</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$apply_date?>" placeholder="Last Name" disabled >
    </div>
 </div>
 
<div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Date Of Birth</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$dob?>" placeholder="Last Name" disabled >
    </div>
 </div>
 
<div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Gender</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$gender?>" disabled >
    </div>
    <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Nationality</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$nationality?>"  disabled >
    </div>
 </div>
 
 <div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Category</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$cat?>" disabled >
    </div>
    <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Experience</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$exp?>"  disabled >
    </div>
 </div>

 <div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Mobile</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$mobile?>" disabled >
    </div>
 </div>

 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Email</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$email?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
  <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Blood Group</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$blod?>" disabled >
    </div>
    <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Nationality</label>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="<?=$nationality?>"  disabled >
    </div>
 </div>
 
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Current Address</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$caddress?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Permanent Address</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$paddress?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Education</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$education?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Specialization</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$spec?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Employee Type</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$emp_type?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Department</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$email?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Joining Date</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$j_date?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Account Number</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$acc_no?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">Bank</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$bank_name?>"  disabled >
    </div>
 </div>
 <div class="row my-2">
 <div class="col-sm-3">
      <label for="lnane" class="col-form-label">IFSC</label>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="<?=$ifsc?>"  disabled >
    </div>
 </div>
 
</form>


</div>
<div class="modal-footer">
       <a href="<?php if(!$_SESSION['admin']) echo "/faculty/home"; else echo "/admin-home";?> "> <button type="button" class="btn btn-secondary" >Close</button></a>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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