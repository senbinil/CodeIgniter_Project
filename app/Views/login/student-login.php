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
    <title>login</title>
    <style>

    body{
      background:#ff3d00
    }

        .container{
    margin-top: 10%;
    border-radius: 15px;
    min-height:100vh;
    }
    .wrapper{
    padding: 40px;
    border-radius:15px

    }
    .content{
    border-radius:15px

    }
    img{
    border-radius: 10px;
    }


     </style>

     <?=view('templates/body');?>





<div class="container">
      <div class="wrapper">
        <div class="content bg-light py-4  row">
          <div class="col-md-6  py-4">
              <img  src="/asset/img/penpaper.jpg"  class="img-fluid"  alt="Responsive image">
          </div>




          <div class="col-md-6  py-4 ">
            <h4 class=" text-center  py-2">Here You Go</h4>
            <hr>
            <div class="d-flex justify-content-center pt-4">
            <form class="form" action="/login/studentlogin" method="post">
              <div class="row">
                <input type="text"  class="form-control text-center "  style="width:300px;"  name="adminno" placeholder="Username" id="">
              </div>
              <br>
              <div class="row">
                <input type="password" name="pass" class="form-control text-center" placeholder="Password" id="">
              </div>
              <div class="row d-flex justify-content-end">
                <div class="recover">
                  <a href="#" class="nav-link">Recover Password</a>
                </div>
              </div>
              <br>
              <div class="row text-danger  d-flex justify-content-center">
                <p class="alert alert-light text-danger"><?php if(session()->getFlashdata('msg')) echo session()->getFlashdata('msg') ?></p>
                </div>
                <br>
              <div class=" d-flex justify-content-center">
                <input type="submit" value="login" class="btn btn-danger px-3  text-lg ">
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>


<?=view('templates/footer')?>
</body>
</html>