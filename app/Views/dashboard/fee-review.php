<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <style>
  
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
     body{
         font-family: 'Montserrat',sans-serif;
         height: 100%;
         min-height: 100%;
         
  
     }
    </style>
</head>
<body>
    <header>
        <span class="hash"><i class="fa fa-dashcube" aria-hidden="true"></i>
        </span>Review
    </header>

    <hr class="my-5">
    <div class="container">
        <h4 class="my-4">Please Review provided details: </h4>
        
            <form action="/dashboard/fee-collector/commit" method="post">
                <div class="row mx-3">
                <label for="" class="col-md-6 col-form-label">Admission No:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="myio1"  name="admission" readonly="readonly" value="<?php echo $admin_no; ?>">
                </div>
                <label for="" class="col-md-6  my-2 col-form-label">Course</label>
                <div class="col-md-6 my-2">
                    <input type="text"  class="form-control" name="cs" id="myio2" readonly="readonly" value="<?php echo $course; ?>">
                </div>
                <label for="" class="col-md-6  my-2 col-form-label">Semester</label>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" id="myio3" name="semester"  readonly="readonly" value="<?php echo $sem; ?>">
                </div>
                <label for="" class="col-md-6  my-2 col-form-label">Mobile Number</label>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control" id="myio3" name="mphone"  readonly="readonly" value="<?php echo $phone; ?>">
                </div>
                <label for="" class="col-md-6  my-2 col-form-label">Amount</label>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control " name="amt"  id="myio4" readonly="readonly" value="<?php echo $amount; ?>">
                </div>
                <label for="" class="col-md-6  my-2 col-form-label">Payment Mode</label>
                <div class="col-md-6 my-2">
                    <input type="text" class="form-control"  name="pay" id="myio5" readonly="readonly" value="<?php echo $payment_mode; ?>">
                </div>
            </div>
            <hr class="my-4">
            <span class="text-primary correct"><a href="/admin-home/feeupdate" id="mybtn">Edit</a>
                 </span>
            <center><input type="Submit" class="btn btn-danger my-5" name="feelog" value="Submit"></center>
            </form>
        </div>
   
</body>
</html>