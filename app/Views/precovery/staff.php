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
    <title>Recovery</title>
    <style>
 
     select,input{
         text-align: center;
     }
     
    

    </style>
</head>
<body class="" style="background: rgb(2,0,36); background: linear-gradient(248deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
<header class="text-center bg-white text-white py-5" style="background: rgb(2,0,36);
background: radial-gradient(circle, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
        <h1>Password Recovery</h1>
    </header>
    <nav class="navbar mb-4 navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  r mx-2 my-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
 FAQ
</button>

<!-- Modal -->
<div class="modal fade bg-info" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">HELP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
         <h5 class="col-sm-12"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i>
Why  i am on this page ?</h5><br>
          
            <p class="col-sm-12 px-3"><dl>
              <dh class="text-left  "><b>Password Reset</b></dh>
              <dd class="my-3">In case user have forgotten his/her password they can reset their password using admission number and phone number which they had provided during registration.</dd>
              <dh><b>Don't Know Password ?</b></dh>
              <dd>New user's please set their password before accessing their profile.</dd>
              <dh><b>Don't Know Admission No or Phone ?</b></dh>
              <dd>In case if you don't know admission number or phone number please contact college office for further assistance. <b><a href="about.php#contactme">Contact us</a></b></dd>
            </dl></p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                    </li>


                   
                </ul>
            </div>
        </div>
    </nav>

<div id="wrapper" style="height:100vh; padding-top:100px;">
    <div class="container   my-4 p-4  text-dark bg-light" id="step1">
        <h3>Step 1:</h3>
        <form action=  method="POST">
        <div class="row">
            <label for="init" class="col-sm-3 col-form-label">Employee ID:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control " id="id" name="id"   autocomplete="off"    onkeypress="return onlyNumberKey(event)" placeholder="Enter you admission number" required>
            </div>
            <label for="name" class="col-sm-3 col-form-label">Phone Number:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="phone" id="phone"    autocomplete="off"  onkeypress="return onlyNumberKey(event)" maxlength="10" minlength="10" placeholder="Enter your number" required>
            </div>
        </div>
        <center><input type="button" id="userchk" class="btn btn-primary mt-3" value="Check"></center>
        </form>
        <span class="mt-5">&nbsp;</span>
    </div>
    <div class="container step2  p-4 text-dark bg-light" style="margin-top:90px;">
        <h3>Step 2:</h3>
        <form action="setpassword.php" method="POST">
            <div class="row">
                <label for="init" class="col-sm-3 col-form-label">Enter your  new Password:</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="pass1"  pattern=".{8,}"  title="Eight or more characters" placeholder="Enter new password" required>
                </div>
                <label for="von"  class="col-sm-3 col-form-label">Confirm new password:</label>
                <div class="col-sm-3">
                    <input type="text" name="pass" class="form-control" onfocusout="return chkpass()" autocomplete="off"  id="pass2" pattern=".{8,}"  title="Eight or more characters" placeholder="Enter the same password" required>
                </div>
            </div>
            <center><input type="button" id="setpass" value="Submit"   class=" mt-4 btn btn-danger"> </center>
        </form>
    </div>
    </div>



    <footer class="footer  py-5 page-footer text-dark bg-light font-small pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
      
          <!-- Grid row -->
          <div class="row">
      
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">
      
              <!-- Content -->
              <h5 class="text-uppercase">CASP</h5>
            <p class="qot  ">
                    "You Learn More From Failure Than From Success. Don’t Let It Stop You. Failure Builds Character." - <small><b>unknown</b></small> </blockquote>
                  </p>
                
      
            </div>
            <!-- Grid column -->
      
            <hr class="clearfix w-100 d-md-none ">
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase">Login</h5>
       
              <ul class="list-unstyled">
                <li>
                  <a href="exlog.php">Student Login</a>
                </li>
                <li>
                  <a href="exlog.php">Staff Login</a>
                </li>
             
              </ul>
      
            </div>
            <!-- Grid column -->
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase">Other</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="/home">Home</a>
                </li>
                <li>
                  <a href="/about">About</a>
                </li>
                
              </ul>
      
            </div>
            <!-- Grid column -->
      
          </div>
          <!-- Grid row -->
      
        </div>
        <!-- Footer Links -->
      
        <!-- Copyright -->
        <div class="footer-copyright text-center ">© 2020 Copyright:
          <a href="#"> www.senk.com</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
      <script>
        function chkpass(){
          var x=document.getElementById("pass1").value;
          var confirmpass=document.getElementById("pass2").value;
          if(x!=confirmpass){
            alert("Password do not match");
            return false;
          }
          return true;
        }
        function onlyNumberKey(evt) { 
          
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 

      function chk(){
        var chk=document.getElementById("admno").disabled;
        if(!chk==true)
        document.getElementById("admno").disabled=true;
        document.getElementById("phone").disabled=true;
        document.getElementById("sub").value="Checking";

      }
      $(document).ready(function(){
        $('#userchk').on('click',function(){
          var id=$('#id').val();
          var phone=$('#phone').val();
          if(id!=="" && phone!=="")
          {
            $('#userchk').attr("disabled","disabled");
            $.ajax({
              url:"/passrecovery/user/chk",
              type:"POST",
              data:{
                type:1,
                id:id,
                mobile:phone
              },
              cache:false,
              success:function(dataResult){
                console.log(dataResult);
                var dataResult=JSON.parse(dataResult);
                if(dataResult.statusCode==200)
                {
                 
                  $('#step1').html('<p class="text-center text-danger"> User Found Please Proceed </p>');
                }
                else if(dataResult.statusCode==201)
                { 
                  $('#userchk').removeAttr("disabled");
                  alert("User Not Found!");
                }
                
              }
            });
          }
        });
      });

      $(document).ready(function(){
        $('#setpass').on('click',function(){
          var pass=$('#pass1').val();
          if(pass!=="")
          {
            $.ajax({
              url:"/passrecovery/user/chk",
              type:"POST",
              data:{
                type:2,
                pass:pass,
              },
              cache:false,
              success:function(dataResult){
                var dataResult=JSON.parse(dataResult);
                if(dataResult.statusCode==1)
                $('#wrapper').html('<div class="jumbotron jumbotron-fluid"><div class="container" align="center"><h1 class="display-4">Password Set</h1><br><p><button class="btn  btn-danger"><a href="/home" class="nav-link text-white">Home</a></button></div></div>');
                else
                alert("Error , try again");
              }
            });
          }
        });
      });
      </script>
</body>
</html>