<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
</head>
<body>
    <header class="py-4 bg-primary">
        <span class="display-3 mx-4  text-white">Library</span>
    </header>
    <hr class="my-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">        
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item  mx-4 my-1">
                        <a class="nav-link  text-light" href="/common/browseLib">Browse</a>
                    </li>
                    <li class="nav-item   mx-3 my-1">
                    <a class="nav-link text-white" href="<?php if(!$_SESSION['admin']) echo "/faculty/home"; else echo "/admin-home";?>">Dashboard Home</a>                    </li>
                    <li class="nav-item  mx-4 my-1">
                        <a class="nav-link  text-light" href="/logout/admin">Logout</a>
                    </li>
                </ul>
        </div>
    </nav>

    <hr class="my-4">
    
<div class="container-fluid">
    <div class="wrapper">
            <div class="row d-flex justify-content-center">
                <span class="alert alert-danger"><?php if(isset($_SESSION['stat']))echo $_SESSION['stat'];?></span>
            </div>
        <form action="/common/fileSubmit" method="POST" class="my-4" enctype="multipart/form-data"> 
            <div class="row d-flex justify-content-center my-3">
                <label class="col-form-label col-md-1">File Description:</label>

                <div class="col-md-6">
                    <textarea name="fileintro" class="form-control" required minlength="20" id="" cols="30" rows="2"></textarea>
                </div>
            </div>
            <div class="row d-flex justify-content-center my-3">
                <select name="cat" class="form-control  required col-md-4"  required id="cat">
                    <option value="" selected >Select the category of upload</option>
                    <option value="1">Notes</option>
                    <option value="2">Syllabus</option>
                    <option value="3">Book</option>
                    <option value="4">Other</option>
                </select>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="custom-file col-md-6 mx-3 my-0">
                    <input type="file"   required class="custom-file-input" name="filetoload" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>    
            <div class="row my-3 d-flex justify-content-center">
                <input type="submit" name="submit" value="Submit" id="sub" class="btn   btn-danger">
            </div>             
        </form>


        <hr class="py-3 my-3 border border-rounded bg-light">
        <div class="recent">
            <div class="table-responsive">
                <table class="table table-borderless">
                <caption class="text-center text-info">Recent Incoming File Submission</caption>
                    <thead>
                        <th>File Description</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Time</th>
                    </thead>
                    <tbody id="tempContent">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    



<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalContent" aria-hidden="true" id="modalContent">
    <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContent">View</h5>
                <button type="button" data-dismiss="modal"  aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>  
                </button>
            </div>
            <div class="modal-body">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate quaerat est rem, dolorum reprehenderit officia consectetur ut, laudantium iusto, similique suscipit veritatis atque temporibus fugiat provident odio sint? Enim, placeat!
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("#cat").on("click",function(){
        var x=$("#cat option:selected").val();
        console.log(x);
        if(x=="")
        {
            alert("Please select a category");
            $("#sub").addClass("disabled");
        }
        else
        $("#sub").removeClass("disabled");

    });

$(document).ready(function(){
    $.ajax({
        url:'/library/fileApprove',
        type:'POST',
        data:{
            type:502
        },
        cache:false,
        success:function(data){
            var res=JSON.parse(data);
            if(res.length>0){
            for(var i=0;i<res.length;i++)
            {
                // var x={fileintro:res[i]['fileIntro'],fileHash:res[i]['fileHash']};
                // console.log(x);
                // views(x);
            $('#tempContent').append("<tr class=\"bg-light\"><td>"+res[i]['fileIntro']+"</td><td>"+res[i]['cat']+"</td><td><button class=\"btn btn-info btn-sm m-1\" data-toggle=\"modal\" onclick=\"views(this.value)\"    value=\""+res[i]['fileHash']+"\" data-target=\"#modalContent\">View</button><button class=\"btn btn-success m-1 btn-sm\" onclick=\"approve(this.value)\" value=\""+res[i]['upload_id']+"\">Approve</button><button class=\"btn btn-danger m-1 btn-sm\" onclick=\"deleteMe(this.value)\" value=\""+res[i]['upload_id']+"\">Delete</button></td><td>"+res[i]['timelog']+"</td></tr>")
            }
            }
        }
    });
});

function views(arg)
{
    $(".modal-body").html("<iframe src = \"\/asset\/ViewerJS\/#..\/upload\/temp\/"+arg+".pdf\" width=\'100%\' height=\'800\' allowfullscreen webkitallowfullscreen></iframe>");
}

function approve(id)
{
    if(confirm("Approve file submission ?"))
    {
        $.ajax({
            url:'/library/fileApprove',
            type:'POST',
            data:{
                type:503,
                id:id
            },
            cache:false,
            success:function(data){
                var res=JSON.parse(data);
                if(res.stat)
                location.reload();
                else
                alert("Error occured please try again");
            }
        });
    }
}

function deleteMe(id)
{
    if(confirm("Delete file submission ?"))
    {
        $.ajax({
            url:'/library/fileApprove',
            type:'POST',
            data:{
                type:504,
                id:id
            },
            cache:false,
            success:function(data){
                var res=JSON.parse(data);
                if(res.stat)
                location.reload();
                else
                alert("Error occured please try again");
            }
        });
    }
}

    </script>
<script src="<?=base_url()?>/asset/js/popper.min.js"></script>
<?php session()->remove('stat');?>
</body>
</html>