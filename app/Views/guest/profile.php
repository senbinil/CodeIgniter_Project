<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest</title>
   
<link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <style>
       
        header{
            width: 100%;

        }
        .timelog{
            font-size:20px;
            font-weight:bolder;
        }
    </style>
   
</head>
<body style="background-image: radial-gradient( circle 263px at 100.2% 3%,  rgba(12,85,141,1) 31.1%, rgba(205,181,93,1) 36.4%, rgba(244,102,90,1) 50.9%, rgba(199,206,187,1) 60.7%, rgba(249,140,69,1) 72.5%, rgba(12,73,116,1) 72.6% );" /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */>
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
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user mx-2"></i><span>Guest</span> </a>
                    <div class="dropdown-menu">
                            <a href="/logout" class="dropdown-item">Logout</a>
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
    
<div class="container-fluid my-5 py-3 cont  text-white">
<h3 class="my-3">Basic Details</h3>
<hr>
<div class="row pl-2">
    <div class="col-md-8">
    <div class="row bg-transparent py-2 text-white w-50">
            <label for="name" class="col-sm-4">Guest ID:</label> <input id="user_id" disabled class="col-sm-2 form-control bg-dark text-light text-center" value="<?=$_SESSION['gid']?>">
          </div>
        <hr>
        <div class="row">
      <label for="name" class="col-sm-2">First Name:</label> <span class="col-md-4"><?=$fname?></span>
      <label for="name" class="col-sm-2">Last Name:</label> <span class="col-md-4 col-sm-12"><?=$lname?></span>
        </div>
        <hr>
        <div class="row">
            <label for="" class="col-sm-2 col-form-label">Email-ID:</label> 
            <span class="col-sm-4 col-form-label"><?=$email?></span>
            <label for="" class="col-md-2 col-sm-12 col-form-label">Phone :</label> 
            <span class="col-md-4 col-sm-12 col-form-label"><?=$phone?></span></div>
           
              <hr>
              <div class="row mb-3">
              <label for="" class="col-sm-2 col-form-label">Date Of Birth</label>
              <span class="col-sm-4 col-form-label"><?=$dob?></span>
              <!-- <label for="" class="col-sm-2 col-form-label">Course Duration:</label>
              <span class="col-sm-4 col-form-label"><??></span> -->
              </div>
              <hr>
              <h5>Academic Details</h5>
              <hr>
              <div class="" role="alert">
               <div class="prevcourse">
               <div class="row">
               <label for="" class="col-sm-2 col-form-label">Year Of Pass:</label> 
                <span class="col-sm-4 col-form-label"><?=$year_pass?></span>
                <label for="" class="col-sm-2 col-form-label">Previous Stream:</label> 
                <span class="col-sm-4 col-form-label"><?=$prevstream['category']?></span>
               </div>
               <div class="row">
               <label for="" class="col-sm-2 col-form-label">Course:</label> 
                <span class="col-sm-4 col-form-label"><?=$pcourse['name']?></span>
               </div>
               </div>
               <div class="row justify-content-md-center my-4  ">
                <div class="table-responsive-md col-4 ">
                <table class="table bg-transparent text-white   table-hover ">
                <caption class="text-danger">Mark Based on Index Mark</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Mark</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><?=$pcourse['sub1']?></td>
                    <td><?=$sub1?></td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td><?=$pcourse['sub2']?></td>
                    <td><?=$sub2?></td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td><?=$pcourse['sub3']?></td>
                    <td><?=$sub3?></td>
                    </tr>
                    <tr>
                    <th scope="row">4</th>
                    <td><?=$pcourse['sub4']?></td>
                    <td><?=$sub4?></td>
                    </tr>
                    <tr>
                    <th scope="row">5</th>
                    <td><?=$pcourse['sub5']?></td>
                    <td><?=$sub5?></td>
                    </tr>
                </table>
                </div>
               </div>
            </div>
            <hr>
          
</div>
<div class="col-md-4 mt-sm-2">
<div class=" rounded   text-light" style="font-size:20px;height:300px;background-image: radial-gradient( circle farthest-corner at 10.9% 80.2%,  rgba(255,124,0,1) 0%, rgba(255,124,0,1) 15.9%, rgba(255,163,77,1) 15.9%, rgba(255,163,77,1) 24.4%, rgba(19,30,37,1) 24.5%, rgba(19,30,37,1) 66% );">
<h4 class=" text-center text-center py-2"> Library</h4>
<hr class="bg-white">
<div class="row  text-dark mx-4">
<ul>
<li class="nav-link my-4"> <a href="" class="text-white">Browse</a> </li>
<li class="nav-link my-4 "><a href="" class="text-white">Submit Material</a></li>
</ul>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $('#fetch_log').on('click',function(){
    var id=$('#user_id').val();
    if(id!=='')
    {
      $.ajax({
        url:'/user/log_fetch',
        type:'POST',
        // dataType:'JSON',
        data:{
          type:1,
          user_id:id
        },
        cache:false,
        success:function(dataResult){
            var time_dump=JSON.parse(dataResult);
            
             for(i=0;i<time_dump[0].length;i++)
             {  
                $("#time_machine_dump").append("<tr><th scope=\"row\">"+time_dump[0][i].time_jumpid+"</th>"+"<td class=\"timelog\">"+time_dump[0][i].timelog+"</td>"+"</tr>");
              }          
        }
      });
    }
  });
});
  </script>
</body>
</html>