<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBox</title>
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <meta charset="UTF-8">
    <style>	
   

body{
       
       font-family: 'Montserrat',sans-serif;
       
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;
      
   }
header{
        position: sticky;;
        font-size: 45px;
        width: 100%;
        padding-left: 1.5rem;
        line-height: 1.5;
        font-weight: 500;
        color: white;
        padding: 35px 22px;

     }
    body {
  font-family: 'Montserrat',sans-serif;
  /* Margin bottom by footer height */
 

}

</style>
</head>
<body>
    <header class="bg-dark ">
        <span class="hash"><i class="fa fa-inbox" aria-hidden="true"></i>
        </span>Suggestion  Inbox
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="<?php if(!$_SESSION['admin']) echo "/faculty/home"; else echo "/admin-home";?>">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger  mx-2 my-1">
                        <a class="nav-link text-white" href="/logout/admin">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<br>
<div class="container-fluid">
    <div class="row mb-3">
    <h3 class="col-md-4 col-sm-12 ">Suggestion Box: </h3>
    <span class="col-md-4 col-sm-12">
    <!-- <button class="btn btn-success" onclick="del_inbox()">Delete 10 Message</button></span><br> <br> -->
    <!--<span class="col-md-4 col-sm-12"><button class="btn btn-success">Empty inbox</button></span>-->
    </div>
</span>
    <div class="table-responsive-sm">
       <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
           <th scope="col"><span class=" ">Suggestion ID</span></th>
           <th scope="col"><span class="">Email ID</span></th>          
           <th scope="col"><span class=" ">Message</span></th>     
           <th scope="col"><span class="">Action</span></th> 
           </tr>  
         </thead>
         <tbody>
        <?php
            for($i=0;$i<count($data);$i++)
            {
                echo "<tr>";
                echo "<th scope=\"row\">".$data[$i]['sug_id']."</th>";
                echo "<td >".$data[$i]['email_id']."</td>";
                echo "<td>".$data[$i]['content']."</td>";
                echo "<td><button class=\"btn btn-danger text-white\" onclick=\"return del(".$data[$i]['sug_id'].")\">Delete</td>";
                echo "</tr>";
            }

        ?>  
      
             </tbody>
    </table>
    </div>
    </div>
    
<script>
function del(id){
    if(confirm("Are you sure you want to delete this message?") && id!=='')
    {
        var msg_id=id;
        console.log(msg_id);
        $.ajax({
            url:"/user/suggestion",
            type:"POST",
            data:{
                type:2,
                del_id:msg_id
            },
            cache:false,
            success:function(dataResult){
                console.log(dataResult);
                var dataresult=JSON.parse(dataResult);
                    if(dataresult.stat)
                    {
                    alert("Deleted");
                    location.reload();
                    }
                    else
                    alert("Error");
                }
        });
    }
    else
    return false;
}
// function del_inbox(){
// if(confirm("Are you sure you want to delete last 10 message from inbox?"))
// { 
//     window.location="delmsg.php?del_in=true";
// }
// }
</script>
</body>
</html>