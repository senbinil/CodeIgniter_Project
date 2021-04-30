
<?php  echo session()->getFlashdata('stat');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Center</title>
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <style>

header{
           position: sticky;
           font-size: 45px;
           width: 100%;
           padding-left: 1.5rem;
           line-height: 1.5;
           font-weight: 500;
          /* background-image: -webkit-linear-gradient(right, #3931af, #00c6ff);*/
           color: white;
           padding: 35px 22px;
   
        }
        body{
            font-family: 'Montserrat',sans-serif;
        }
        .container
        {
            padding-bottom: 100px;
        }
    </style>
</head>
<body>
    <header class="container-fluid bg-dark">
        <span class="hash"><i class="fa fa-dashcube" aria-hidden="true"></i>
        </span>Command Center
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

<hr class="my-5">

<div class="container my-5">
    <h4>Message Center</h4>
    <form action="/dashboard/announce" method="post">
    <div class="row my-5">
        <label for="" class="col-form-label col-sm-3">Enter the message:</label>
        <div class="col-sm-5">
            <textarea class="form-control" placeholder="Enter your Message here" name="message" required></textarea>
        </div>
        <label for="" class="col-sm-1">Semester</label>
        <div class="col-sm-3">
            <select name="semester" class="form-control" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center mt-1 mb-3">
            <input type="checkbox" name=""  class="" id="" required><span class="mx-1">Verify</span> 
        </div>
    </div>
    <center><input type="reset" value="Clear" class="btn btn-primary mx-2"><input class="btn btn-danger mx-2"  name="log"  type="submit" value="Enter"></center>
</form>
</div>



</body>
</html>