<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/asset/css/common.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <title>Salary Center</title>
    <style>
        header {
            position: sticky;
            font-size: 45px;
            width: 100%;
            padding-left: 1.5rem;
            line-height: 1.5;
            font-weight: 500;
            color: white;
            padding: 35px 22px;
        }

        .container {
            margin-bottom: 209px;
        }
        #postCheck{
            display:none;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-dark">
        <span class="hash"><i class="fa fa-dashcube" aria-hidden="true"></i> </span>Payment Center
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="/admin-home">Dashboard Home</a>
                    </li>
                    <li class="nav-item btn btn-danger mx-2 my-1">
                        <a class="nav-link text-white" href="/logout/admin">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <hr class="my-4" />
    <div class="container">
        <div class="status d-flex justify-content-center alert-danger">
            <h4><?php if(isset($_SESSION['payResult'])) echo $_SESSION['payResult'];?></h4>
        </div>
        <div id="preCheck">
        <h4 class="mb-3">Employee Details:</h4>
        <form action="#" align="center" method="POST" class="border border-danger py-4">
            <div class="row my-2">
                <label for="" class="col-form-label col-sm-2">Employee ID:</label>
                <div class="col-sm-3">
                    <input type="text" id="empid" class="form-control" autocomplete="off" required   onkeypress="return onlyNumberKey(event)"
                        placeholder="Employee ID"  maxlength="7"/>
                </div>
                <label for="" class="col-form-label col-sm-2">Phone No:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="phone" autocomplete="off" required   onkeypress="return onlyNumberKey(event)"
                        placeholder="Phone Number" maxlength="10" />
                </div>
            </div>
            <center>
                <input type="button" class="btn btn-info my-3" id="preChecksub" name="log" value="Check" />
            </center>
        </form>
        </div>



        <div id="postCheck">
            <h4>Please verify following details:</h4>
        <form action="/dashboard/staff/salaryPayment" method="POST" class="mt-5 px-4 py-4 border border-primary">
            <div class="row my-2">
                <label for="" class="col-form-label col-sm-2">Employee Name:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="emp_name" id="emp_name"  readonly
                        required />
                </div>
                <label for="" class="col-form-label col-sm-2">Account No:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="acc" required id="empAcc" readonly
                         placeholder="A/C Number" />
                </div>
            </div>
            <div class="row my-2">
                <label for="" class="col-form-label col-sm-2"> IFSC:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="ifsc" required readonly
                     id="empIfsc"/>
                </div>
                <label for="" class="col-form-label col-sm-2"> Monthly Pay:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="amt" id="empSal" readonly
                        required />
                </div>
            </div>
            <div class="row my-2">
                <label for="" class="col-form-label col-sm-2"> Month:</label>
                <div class="col-sm-3">
                    <select name="month" class="form-control" id="">
                        <option value="<?=date('F')?>" selected><?=date('F')?>
                <?php $month=array('January','February','March','April','May','June','July','August','September','October','November','December') ;
                for($i=0;$i<12;$i++)
                {
                    if($month[$i]==date('F'))
                    continue;
                    echo "\n<option  value=\"$month[$i]\">$month[$i]</option>";
                }?>
                    </select>
                </div>
                <label for="" class="col-form-label col-sm-2"> Year:</label>
                <div class="col-sm-3">
                    <select name="year" class="form-control" id="">
                        <option value="<?=date('Y')?>" selected><?=date('Y')?></option>
                    </select>
                </div>
            </div>
            <center>
                <input type="submit"  class="btn btn-danger my-2" name="pay" value="Pay" />
            </center>
        </form>
        </div>
    </div>
    <script>
     $(document).ready(function(){
         $('#preChecksub').on('click',function(){
             var empid=$("#empid").val();
             var phone=$("#phone").val();
             if(empid=='' && phone=="")
              return alert('Please Fill up the details');
             $.ajax({
                 url:"/dashboard/staff/salary",
                 type:'POST',
                 data:{
                     empid:empid,
                     phone:phone
                 },
                 cache:false,
                 success:function(result){
                    var content=JSON.parse(result);
                    if(content.stat)
                    {
                        $('#postCheck').show();
                        $('#preCheck').hide();
                        $('#emp_name').val(atob(content.name));
                        $('#empSal').val(atob(content.amt));
                        $('#empAcc').val(atob(content.acc));
                        $('#empIfsc').val(atob(content.ifsc));
                        console.log(empid);
                    }
                    else
                    {
                        alert('Employee not found!');
                    }
                 }
             })

         })
     })

     function chk(in_val){
         if(in_val=="")
         alert('Please Fill up the details');
     }
     function onlyNumberKey(evt) {
         
         // Only ASCII character in that range allowed
         var ASCIICode = (evt.which) ? evt.which : evt.keyCode
         if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
             return false;
         return true;
     }
    </script>
</body>

</html>