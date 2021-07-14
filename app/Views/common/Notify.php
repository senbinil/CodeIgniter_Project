
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <title>DashBoard</title>
    <style>
        
  

            .main{
                margin-bottom: 200px;
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
             .content{
                 border:2px solid #00c6ff;
                 height: 500px;
                 background-color: white;
                 overflow: auto;
                 
             }
             .main input{
                text-align: center;
             }
             
             </style>
</head>
<body>
    <header class="container-fluid">
        <span class="hash"><i class="fa fa-briefcase" aria-hidden="true"></i>
        </span>Bulletin
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
    <!--content inside-->
    <div class="container-fluid main">
        <div class="alert alert-danger d-flex justify-content-center ">
            <?php if(session()->get('stat')!==NULL and session()->get('stat'))echo 'Request Processed'; ?>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h3>Bulletin toolbox:</h3><br>
                <small>Message Deletion:</small><br><br>
                <!-- <form action="delbullet.php" method="POST" class="form-group"> -->
                  <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="msgid" required placeholder="Message Id">
                    </div>
                  </div>
                 <center> <button type="submit" name="logbu" id="delete"  class="btn btn-danger my-2" value="Delete">Delete</button>
                </form>
                <hr>
                <small>New  Message:</small><br><br>
                <form action="/dashboard/notify" method="POST" class="form-group">
                    <div class="row">
                      <div class="col-sm-12">
                        <select name="cat" class="form-control" id="">
                            <option value="0" selected disabled>Select the category of message</option>
                            <option value="Result">Result</option>
                            <option value="Notice">Notification</option>
                            <option value="Event">Event</option>

                        </select>
                    </div>
                      <div class="col-sm-12 my-4">
                        <textarea name="content" name="message" cols="60"placeholder="Enter the Message" class="form-control" rows="6"></textarea>
                    </div>
                    </div>
                   <center> <input type="submit" class="btn btn-danger" value="Submit"><input type="reset" class=" mx-3 my-2 btn btn-info" value="Reset"></center>
                  </form>
            </div>
            <div class="col-sm-6">
                <h3>                Bulletin View:
                </h3>
                <div class="content">
                    <div class="text-light my-2">
<?php
    for($i=0;$i<count($data);$i++)
        echo "<p class=\" bg-primary list-unstyled card pl-2  mx-2\">". "ID:".$data[$i]['msg_id']."<span class=\"mr-1\"></span>".$data[$i]['msg']."</p><hr>";
?>  
        </div>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
    $('#delete').on('click',function(){
        var msg_id=$('#msgid').val();
        if(!msg_id=='')
        {
            $.ajax({
                url:'/dashboard/notify',
                type:'POST',
                data:{
                    id:msg_id,
                    type:100
                },
                cache:false,
                success:function(result){
                    var res=JSON.parse(result);
                    if(res.stat)
                    {
                        alert('Deleted');
                        window.location.replace("/common/notification");

                    }
                    
                    else
                    alert('Invalid Message ID');
                }
            });
        }
    });
});
</script>
</body>
</html>


