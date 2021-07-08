
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Log</title>
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <style media="screen">


        .btn-grad {background-image: linear-gradient(to right, #24C6DC 0%, #514A9D  51%, #24C6DC  100%)}
        .btn-grad {
           margin-top: 10px;
           text-align: center;
           text-transform: uppercase;
           transition: 0.5s;
           background-size: 200% auto;
           color: white;
           border-radius: 10px;
           display: block;
         }

         .btn-grad:hover {
           background-position: right center; /* change the direction of the change here */
           color: #fff;
           text-decoration: none;
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
  </style>
</head>
<body>
<header>
        <span class="hash"><i class="fa fa-audio-description"></i>
        </span>Admisson Announcement
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
                        <a class="nav-link text-white" href="/logout/admin">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<hr>
<div class="content container">
  <div class="wrapper mt-4">
    <h4>Admission</h4>
    <hr>
    <div class="stat row text-center justify-content-center">
    <span class=" mx-4 my-2 col-md-6 bg-danger  text-white"><?=session()->getFlashdata('response');?></span>
    </div>
   <br>
    <div class="p-2 border">
      <div class="admission-enable p-2">
            <form action="/dashboard/admissionEntry" method="POST">
              <fieldset>
                <div class="row">
                  <!-- <label  class="col-form-label col-md-1">Category:</label>
                <div class="col-md-2">
                    <select class="form-control" name="">
                      <option value="UG" selected>UG</option>
                    </select>
                </div> -->
                <label class="col-form-label col-md-1">Course</label>
                <div class="col-md-5">
                  <select class="form-control" name="course">
                    <option value="30" selected>Bsc Computer Science</option>
                    <option value="44" >Bachelor of Computer Application</option>

                  </select>
                </div>
                <label class="col-form-label col-md-1">Year</label>
                <div class="col-md-2">
                  <select class="form-control" name="year">
                    <option value="<?=date('Y')?>" selected><?=date('Y');?></option>
                  </select>
                </div>
                </div>
                <div class="row  mt-4 d-flex justify-content-center">
                    <div >
                      <button  class="btn-grad btn px-4" type="submit" name="button">Submit</button>
                    </div>
              </div>
              </fieldset>
            </form>
      </div>
      </div>
    <div class="my-3">
      <h4>Current Admission Logging</h4>
      <hr class="my-4">
      <div class="row">
        <table class="table table-borderless">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course</th>
          <th scope="col">Year</th>
          <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if(isset($adminlog))
            {
                for($i=0;$i<count($adminlog);$i++)
                {
                    echo "<tr>
                    <th scope=\"row\">".$i."</th>
                    <td>".$adminlog[$i]['Course']."</td>
                    <td>".$adminlog[$i]['year']."</td>";
                    if($adminlog[$i]['status'])
                   echo" <td><button type=\"button\" class=\"btn btn-primary ml-2 btn-sm\" name=\"button\" disabled>Active</button> <button type=\"button\" onclick=\"adminDisable(".$adminlog[$i]['admitID'].")\" class=\"btn btn-primary mx-2  btn-danger btn-sm\">Disable</button></td>
                    </tr>";
                    else
                    echo" <td><button type=\"button\"  class=\"btn btn-primary ml-2 btn-sm\" name=\"button\" disabled>Inactive</button></td>
                    </tr>";
                }
            }
        ?>
        </tbody>
      </table>
      </div>
    </div>

  </div>
</div>
<script>
function adminDisable(admissionLogid)
{
  console.log(Number(admissionLogid));
  if(confirm("Are you sure to Disable this entry?") && admissionLogid!=='')
  {
    $.ajax({
      url:'/dashboard/admissionEntryControl',
      type:'POST',
      data:{
        id:Number(admissionLogid)
      },
      cache:false,
      success:function(result){
        var data=JSON.parse(result);
        console.log(data);
        if(data)
        {
          alert("Processed");
          location.replace("/admin-home/adminlog");
        }
        else
        alert("Error occurred");
      }
    });
  }

}
</script>
<script src="/asset/js/popper.min.js"></script>
</body>
</html>

