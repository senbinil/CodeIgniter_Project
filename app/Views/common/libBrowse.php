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
    <style>
        .content a{
            cursor: pointer;
        }

    </style>
</head>
<body>
    <header class="py-4 bg-primary">
        <span class="display-3 mx-4  text-white">#Browse</span>
    </header>
    <hr class="my-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">        
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item   mx-3 my-1">
                    <a class="nav-link text-info" href="<?php if(isset($_SESSION['admin'])){if(!$_SESSION['admin']) echo "/faculty/home"; else echo "/admin-home";} if(isset($_SESSION['student_id'])) echo '/student/home';else echo'/guest/home/';?>">Dashboard Home</a>                    </li>
                    <li class="nav-item  mx-4 my-1">
                        <a class="nav-link  text-info" href="/logout/<?php if(isset($_SESSION['admin']))echo'admin'; if(isset($_SESSION['student_id'])) echo 'student';else echo'guest';?>">Logout</a>
                    </li>
                </ul>
        </div>
    </nav>

    <hr class="my-4">

<div class="container-fluid ">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-3 border">
                <h4>#Category</h4>
                <hr>
                        <select name="cat" class="form-control" id="">
                        <option value="" disabled selected >Select the category of upload</option>
                        <option value="1">Notes</option>
                        <option value="2">Syllabus</option>
                        <option value="3">Book</option>
                        <option value="4">Other</option>
                        </select>
                    <div class="content my-3 mx-4" style="">
                        <?php
                        if(isset($libBrowse))
                        {
                            for($i=0,$j=1;$i<count($libBrowse);$i++,$j++)
                            echo "
                            <div class=\"row my-1\">
                            <div class=\"col-1\">".$j."</div>
                            <div class=\"col\"><a onclick=\"test('".$libBrowse[$i]['fileHash']."')\" class=\"link\">".$libBrowse[$i]['fileIntro']."</a></div>
                             </div>
                            ";
                        }


                        ?>
                        
                    </div>
            </div>
            <div class="col">
            <h4>#Preview</h4>
            <hr>
                <div class="viewer">
                    <p class="text-center my-5">Click on any of the document to preview here</p>
                    <!-- <iframe style="float:right;" src = "/asset/ViewerJS/#../upload/doc.pdf" width='100%' height='500' allowfullscreen webkitallowfullscreen></iframe> -->
                </div>
            </div>
        </div>
    </div>
</div>










<script>
function test(files)
{
    console.log(files);
    $.ajax({
        url:'/library/Viewer',
        type:'POST',
        data:{
            fileInfo:files,
            type:203
        },
        cache:false,
        success:function(dataRes){
            var data=JSON.parse(dataRes);
            if(data.stat)
            alert("Error Occured");
            else
            {
                $('.viewer').html("<iframe src = \"\/asset\/ViewerJS\/#..\/upload\/"+data.cat+"\/"+files+".pdf\" width=\'100%\' height=\'800\' allowfullscreen webkitallowfullscreen></iframe>");
            }
        }
    });
}
</script>


    <script src="<?=base_url()?>/asset/js/popper.min.js"></script>
</body>
</html>