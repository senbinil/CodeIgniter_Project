<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fee Collector</title>
    <style>
 html{
         height: 100%;
         margin: 0;
     }
     select,input{
         text-align: center;
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
     @font-face{
      font-family:Montserrat;
      src: url(fonts/Montserrat-Regular.ttf);
    }
     body{
         font-family: 'Montserrat',sans-serif;
         height: 100%;
         min-height: 100%;
         
  
     }
   
    </style>

<link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
</head>
<body>
    <header>
        <span class="hash"><i class="fa fa-dashcube" aria-hidden="true"></i>
        </span>Dashboard
    </header>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="/admin-home">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger  mx-2 my-1">
                        <a class="nav-link text-white" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<br>


    <div class="container ">
    <div class="alert alert-danger  px-4" role="alert">
        <?php if(isset($payment_id)) echo 'Your Payment ID  : '.'<span class="font-weight-bold ">'.$payment_id.'</span>'; ?>
    </div>
        <fieldset>
        <legend><h3>Fee Entry</h3>
        </legend>
        
        <center>
     
            <form action="/dashboard/fee-collector/review" method="post" class="mt-4">
            <div class="form-group row ">
                    <label for="" class="col-sm-4 col-form-label">Admission Number</label>
                    <div class="col-sm-4">
                        <input type="text" name="admin_no" id="admin_no" class="form-control" required>
                    </div>
                    <button class="btn btn-danger" type="button" id="fetch">Fetch</button>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Course</label>
                    <div class="col-sm-4">
                        <input type="text" id="course" name="course" class="form-control " readonly  required id="">
                        <!-- <select name="course" class="form-control" id="">
                            <option value="init" selected disabled>Select Course</option>
                            <option value="Bsc Computer Science">Bsc Computer Science</option>
                            <option value="Bachelor of Computer Application">Bachelor of Computer Application</option>
                        </select> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Semester</label>
                    <div class="col-sm-4">
                        <input type="text" id="semester" name="semester" class="form-control" readonly required id="">
                     <!-- <select name="semester"  class="form-control" id="">
                         <option value="init" selected disabled>Select Semester</option>
                         <!-- <?php //for($i=1;$i<=6;$i++)
                                //echo "<option value=\"$i\">Semester $i</option>";
                         ?> -->
                        
                     <!-- </select> --> 
                    </div>
                </div>
                <div class="form-group row ">
                <label for="" class="col-md-4  my-2 col-form-label">Mobile Number</label>
                <div class="col-md-4 my-2">
                    <input type="text" class="form-control" id="mobile" name="phone" readonly required minlength="10" maxlength="10">
                </div>
                </div>
              
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="amount" name="amount" readonly required minlength="10" maxlength="10">
                    <!-- <select name="amount" cass="form-control" >
                        <option value="15750">15750</option>
                        <option value="16750">16750</option>
                    </select> -->
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Paid</label>
                    <div class="col-sm-4">
                        <select name="mode" class="form-control" readonly>
                            <option value="Cash">By Cash</option>
                        </select>
                        </div>
                </div>
                    <div class="form-group">
                        <input type="submit" name="log" class=" btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-primary">
                    </div>
                
            </form>
           
        </center>
    </fieldset>
    </div>


<script>
$(document).ready(function(){
    $('#fetch').on('click',function(){
        var id=$('#admin_no').val();
        console.log(id);
        if(id!=='')
        {
            $.ajax({
                url:'/dashboard/fee-collector/fetch',
                type:'POST',
                data:{
                    type:1,
                    id:id
                },
                cache:false,
                success:function(result){
                    var data=JSON.parse(result);
                    console.log(data['sem']);
                    $('#course').val(data['course']['course_name']);
                    $('#semester').val(data['sem']);
                    $('#mobile').val(data['phone']);
                    $('#amount').val(data['course']['sem_fee']);

                }
            })
        }
    })
})    
</script>
</body>
</html>