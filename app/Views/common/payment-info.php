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
        </span>Payment Info
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="<?php if($faculty==TRUE) echo "/faculty/home"; else echo "/admin-home";?>">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger  mx-2 my-1">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container card-body bg-light my-4">
                    <div class="row  table-responsive-md">
                        <table class="table table-borderless">
                            <caption class="ml-auto">Recent  Payments</caption>
                            <thead class="bg-dark text-white">
                              <tr>
                                <th scope="col">Payment Id</th>
                                <th scope="col">Admission Id</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Time</th>
                              </tr>
                            </thead>
                            <tbody class="bg-danger text-white">
                              <?php 
                              for($i=0;$i<count($info);$i++) 
                                {

                                   echo " <tr>
                                    <th scope=\"row\">".$info[$i]['payment_id']."</th>
                                    <td>".$info[$i]['admin_no']."</td>
                                    <td>".$info[$i]['semester']."</td>
                                    <td>".$info[$i]['amount']."</td>
                                   <td>".$info[$i]['timelog']."</td>
                                  </tr>";
                                }
                              
                              ?>
                            </tbody>
                          </table>
                    </div>
                </div>




<script>

</script>
</body>
</html>