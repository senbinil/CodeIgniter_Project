<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <title>Verification</title>
    <style>
        .container
        {
            margin-top: 200px;

        }
        a:hover{
            text-decoration: none;
        }
      
    </style>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="card  p-4 bg-dark text-white">
            <div class="card-body">
                <h5 class="text-justify">
                <p class="display-4 text-center"><?php if($stat) echo "Registration Successfull !"; else echo "Registration Failed."; ?></p>

                </h5>
                <h2 class="my-3" align="center">Thank You</h2>
                <p class="mt-4">Still Here ? Click <a href="/home">Here</a> </p>
            </div>
        </div>
    </div>



    <script src="/asset/js/popper.min.js"></script>
</body>
</html>