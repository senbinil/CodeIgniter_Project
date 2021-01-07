<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

<link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >


<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Enroll</title>
    <style>
 
    body{
         height: 100%;
         min-height: 100%;
        width:max;
     }
   
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
     html{
         height: 100%;
         margin: 0;
     }
     select,input{
         text-align: center;
     }
     header{
        position: sticky;;
        font-size: 45px;
        width: 100%;
        padding-left: 1.5rem;
        line-height: 1.5;
        font-weight: 500;
        background-image: -webkit-linear-gradient(right, #3931af, #00c6ff);
        color: white;
        padding: 35px 22px;

     }

    

    </style>
</head>
<body>
    <header>
        <span class="hash"><i class="fa fa-dashcube" aria-hidden="true"></i>
        </span>Dashboard
    </header>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="/admin-home">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger  mx-2 my-1">
                        <a class="nav-link text-white"  href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<br>

<div class="container">
<div class="alert alert-danger  px-4" role="alert">
<?php if(isset($admin_no)) echo 'Your admission number : '.'<span class="font-weight-bold ">'.$admin_no.'</span>'; ?>
</div>
    <form action="/dashboard/enroll"  method="POST"> 

        <!--Personal details-->
        <div class=" bg-info py-2 pl-2 my-2  text-white instit">
            <h6>Student Details</h6>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label  ">First Name
            </label>
            <div class="col-sm-3">
                <input type="text" name="fname" class="form-control" required maxlength="30" minlength="3" autocomplete="off">
            </div>
                <label for="" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-3 ">
                    <input type="text" name="lname" class="form-control" required maxlength="30" minlength="1" autocomplete="off" >
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-form-label col-sm-3">Date Of Birth</label>
            <div class="col-sm-3">
               <input type="text" class="form-control " name="dob"  placeholder="Pick a date" id="datepicker" required  autocomplete="off">
              <!-- <input type="text" class="form-control" name="dob" placeholder="DD-MM-YYYY">-->
            </div>
            <label for=""class="col-form-label col-sm-3">Blood Group</label>
            <div class="col-sm-3">
                <input type="text" name="blood-group" class="form-control" required maxlength="3" minlength="1" autocomplete="off">
            </div>
        </div>
        <div class=" row form-group">
            <label for="" class="col-form-label col-sm-3">Address</label>
            <div class="col-sm-4">
                <input type="text" name="caddress" class="form-control" required minlength="10" autocomplete="off">
            </div>
            <label for="" class="col-form-label col-sm-2">State</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="state" placeholder="State" required minlength="4" autocomplete="off">
            </div>
        </div>
        <div class=" row form-group">
            <label for="" class="col-form-label col-sm-3">City</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="city" required minlength="6" autocomplete="off">
            </div>
            <label for="" class="col-form-label col-sm-3">Zip Code</label>
            <div class="col-sm-3">
                <input type="text" name="pincode" class="form-control" required minlength="6" maxlength="6" autocomplete="off">
            </div>
        </div>
        <div class="row form-group">
           <label for=""class="col-sm-3">Gender</label>
            <div class="col-sm-5">
                <label for="" class="radio-inine">
                    <input type="radio" name="gender" value="male"  required>
                    Male
                </label>
                <label for="" class="radio-inine">
                    <input type="radio" name="gender" value="female">
                    Female
                </label>
            </div>
        </div>

     <!--Gardian details
     -->
     <div class=" bg-info py-2 pl-2 my-2  text-white instit">
        <h6>Guardian Details</h6>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label ">First Name
        </label>
        <div class="col-sm-3">
            <input type="text" name="gfname" class="form-control" required minlength="4" autocomplete="off">
        </div>
            <label for="" class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-3 ">
                <input type="text" class="form-control" name="glname" required minlength="1" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-form-label col-sm-3">Relationship With Student</label>
        <div class="col-sm-3">
            <select name="relation"  class="form-control" required>
                <option value="init" disabled selected>Select</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Brother">Brother</option>
                <option value="Relative">Relative</option>
            </select>
        </div>
        <label for="" class="col-form-label col-sm-3">Phone </label>
        <div class="col-sm-3">
            <input type="text" name="gphone" maxlength="10" class="form-control" onkeypress="return onlyNumberKey(event)" required maxlength="10" minlength="10" autocomplete="off">
        </div>
    </div>





        <div class=" bg-info py-2 pl-2 my-2  text-white instit">
            <h6>Academic Details</h6>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label ">Year of Pass</label>
            <div class="col-sm-7">
                <select name="ypass"  class="form-control" required>
                   
                    <?php
                        for($i=1980;$i<2020;$i++)
                            echo "<option value=\"$i\">$i</option>"
                    ?>
                </select>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="" class="col-form-label  col-sm-3">Roll Number</label>
            <div class="col-sm-3 " >
                <input type="text" name="exroll" class="form-control" onkeypress="return onlyNumberKey(event)" required minlength="4" maxlength="10" autocomplete="off">
            </div>
            <label for="" class="col-form-label  col-sm-3">Category</label>
            <div class="col-sm-3 ">
            <select name="pcourse" class="form-control"  required>
                <option value="Science">Science</option>
                <option value="Commerce">Commerce</option>
                <option value="Humanities">Humanities</option>
                <option value="Biology">Biology</option>
                <option value="other">Other</option>
            </select>
        </div> 
    </div>




       <div class=" bg-info py-2 pl-2 my-2  text-white instit">
            <h6>Additional Details</h6>
        </div>
            <div class="form-group row ">
            <label for="" class="col-form-label  col-sm-3">UG Course</label>
            <div class="col-sm-3 ">
             <select name="ugcourse" class="form-control" required>
                 <option value="Bsc Computer Science" selected>Bsc Computer Science</option>
                 <option value="Bachelor Of Computer Application">Bachelor Of Computer Application</option>
             </select>
            </div>
            <label for="" class="col-form-label  col-sm-3">Email ID</label>
            <div class="col-sm-3 ">
                <input type="email" name="email" class="form-control" required autocomplete="off">
            </div>


           
            <div class=" my-5 container ">
            <center> <input type="submit" value="Submit" name="sub" class=" btn btn-primary"></center>
            </div>
        </div>
    </form>
</div>

<script>

  function onlyNumberKey(evt) { 
          
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 
</script>
</body>
</html>