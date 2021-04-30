<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['username']?></title>
   
<link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <style>
       
        body{
            font-family: 'Montserrat',sans-serif;
            background:	#3f51b5;
        }
        header{
            width: 100%;
            background:	#3f51b5;

        }
        .timelog{
            font-size:20px;
            font-weight:bolder;
        }
    </style>
   
</head>
<body >
    <header class="px-3 text-white py-4 ">
        <h2 class="display-4">#Profile</h2>
    </header>
    <nav class="navbar   navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-md-none ml-auto" type="button" data-toggle="collapse" data-target="#content" aria-controls="content" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-angle-double-down " style="font-size:20px;"></i>
            </button>
    
            <div class="collapse navbar-collapse " id="content">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item  mx-4">
                    <button type="button nav-link" class="btn btn-danger" data-toggle="modal" id="fetch_log" data-target="#timemachine">Time Machine <i class="fa fa-history"></i></button>
                    </li>
                    <li class="nav-item username dropdown active  bg-light mx-4 ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user mx-2"></i><span><?=$_SESSION['username']?></span> </a>
                    <div class="dropdown-menu">
                            <a href="/logout/<?php if(isset($_SESSION['D_staff']))echo 'staff';else echo 'student';?>" class="dropdown-item">Logout</a>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="timemachine" tabindex="-1" role="dialog" aria-labelledby="timemachine" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title text-center" >
                        Recent Login 
                    </h5>
                    <button class="close" data-dismiss="modal"  aria-label="close"> <span aria-hidden="true">&times;</span></button>
                </div>


                <div class="modal-body">
                    <div class="content">
                    <div class=" my-3 table-responsive">
                        
                        <table class="table">
                        <thead class="bg-light text-black">
                        <tr>
                        <th  scope="col">Log ID</th>
                        <th scope="col">Time</th>
                        </tr>
                        </thead>
                        <tbody id="time_machine_dump" class="text-dark">
                        <?php
                        // for($i=0;$i<count($timedata);$i++)
                        // echo "<tr><th scope=\"row\">".$timedata[$i]['time_jumpid']."</th>"."<td class=\"timelog\">".$timedata[$i]['timelog']."</td>"."</tr>";

            ?>
                        </tbody>
                        </table>

                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    