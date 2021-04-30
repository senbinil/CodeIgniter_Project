<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet" >
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
    <style>
 @media (min-width: 992px) {
      .modal-dialog {
        max-width: 50%;
      }
    }
    </style>
</head>
<body>
<header class="bg-dark mb-3 py-3">
    <span class="display-2 mx-2 text-light">#Admission Portal</span>
  </header>
  <hr class="my-3">


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Welcome back <span class="font-weight-bold text-capitalize"><?=$username?></span></a>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-align-justify"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item   mx-3 my-1">
          <a class="nav-link text-dark " href="/admin-home">Dashboard Home</a>
        </li>
        <li class="nav-item  mx-4 my-1">
          <a class="nav-link  text-dark" href="/logout/admin">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <hr class="my-2">


<div class="container-fluid">
  <div class="wrapper">
    <div class="table-responsive">
      <table class="table ">
        <thead>
          <th scope="col">Application ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
          <th scope="col">Submission Date</th>
        </thead>
        <tbody>
        <?php
          if(isset($admission_rq))
          {
            for ($i=0;$i<count($admission_rq);$i++)
            echo "
            <tr>
            <th scope=\"row\">".$admission_rq[$i]['application_id']."</th>
            <td>".$admission_rq[$i]['fname']."</td>
            <td>".$admission_rq[$i]['lname']."</td>
            <td>UG</td>
            <td><span><button id=\"expand\" onclick=\"tryMe()\" data-toggle=\"modal\" data-target=\"#myModal\" class=\"btn  btn-sm btn-primary mr-1\" value=\"".$admission_rq[$i]['guest_id']."\">View More</button> <button value=\"".$admission_rq[$i]['application_id']."\" onclick=\"deleteME(this.value)\" class=\"btn btn-sm btn-danger\">Delete</button> </span></td>
            <td>".$admission_rq[$i]['timelog']."</td>
          </tr>
            ";
          }

        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Request Details -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div role="document" class=" modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="myModal">Application Details</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-dark" >
              <div class="container" id="modalText">
               
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<script src="<?=base_url()?>/asset/js/popper.min.js"></script>
<script>
function tryMe()
{
    var c =document.getElementById('expand').value;
    if(c!=='')
    {
       $.ajax({
           url:'/dashboard/getReq',
           type:'POST',
           data:{
               type:200,
               id:c
           },
           cache:false,
           success:function(dataRes){
               var data_dump=JSON.parse(dataRes);
               console.log(data_dump);
               var temp=[data_dump.reqested_cs];
               for(var i=0;i<2;i++)
               {
                   if(temp[0][i].course_id==data_dump.req.option_1)
                   var option1=temp[0][i].course_name;
                   if(temp[0][i].course_id==data_dump.req.option_2)
                   var option2=temp[0][i].course_name;
               }

               console.log(option2);

               $("#modalText").html("<div class=\"personal\">\r\n <div class=\"row\">\r\n   <label class=\"col-form-label col-md-2\">First Name:<\/label>\r\n  <label class=\"col-form-label col-md-4\">"+data_dump.fname+"<\/label>\r\n<label class=\"col-form-label col-md-2\">Last Name:<\/label>\r\n <label class=\"col-form-label col-md-4\">"+data_dump.lname+"<\/label>\r\n<\/div>\r\n<div class=\"row my-2\">\r\n<label class=\"col-form-label col-md-2\">Gender:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.gender+"<\/label>\r\n<label class=\"col-form-label col-md-2\">DOB:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.dob+"<\/label>\r\n<\/div>\r\n <div class=\"row my-2\">\r\n <label class=\"col-form-label col-md-2\">Blood:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.blood_group+"<\/label>\r\n<label class=\"col-form-label col-md-2\">Address:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.address+"<\/label>\r\n <\/div>\r\n<div class=\"row my-2\">\r\n<label class=\"col-form-label col-md-2\">State:<\/label>\r\n  <label class=\"col-form-label col-md-4\">"+data_dump.state+"<\/label>\r\n<label class=\"col-form-label col-md-2\">City:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.city+"<\/label>\r\n  <\/div>\r\n <div class=\"row my-2\">\r\n<label class=\"col-form-label col-md-2\">Pincode:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.pincode+"<\/label>\r\n <label class=\"col-form-label col-md-2\">Guardian Name:<\/label>\r\n                    <label class=\"col-form-label col-md-4\">"+data_dump.gfname+"  "+data_dump.glname+"<\/label>\r\n<\/div>\r\n <div class=\"row my-2\">\r\n <label class=\"col-form-label col-md-2\">Phone:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.phone+"<\/label>\r\n<label class=\"col-form-label col-md-2\">Email:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.email+"<\/label>\r\n<\/div>\r\n<\/div>\r\n<div class=\"acadamic\">\r\n<h4 class=\"text-center my-2\">Academic Details<\/h4>\r\n<hr>\r\n<div class=\"row my-2\">\r\n<label class=\"col-form-label col-md-2\">Year Of Pass:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.year_pass+"<\/label>\r\n<label class=\"col-form-label col-md-2\">Pervious Stream:<\/label>\r\n <label class=\"col-form-label col-md-4\">"+data_dump.prev_stream.category+"<\/label>\r\n <\/div>\r\n<div class=\"row my-2\">\r\n<label class=\"col-form-label col-md-2\">Syllabus:<\/label>\r\n <label class=\"col-form-label col-md-4\">"+data_dump.syllabus.Name+"<\/label>\r\n<label class=\"col-form-label col-md-2\">Previous Course:<\/label>\r\n<label class=\"col-form-label col-md-4\">"+data_dump.prev_sub.name+"<\/label>\r\n<\/div>\r\n<hr class=\"py-3\">\r\n<div class=\"d-flex justify-content-center row\">\r\n<div class=\"table-responsive col-md-6 \">\r\n<table class=\"table table-sm table-borderless table-dark\">\r\n<thead>\r\n<th scope=\"col\">#<\/th>\r\n<th scope=\"col\">Mark<\/th>\r\n<\/thead>\r\n<tbody class=\"bg-light text-dark\">\r\n<tr>\r\n<td>"+data_dump.prev_sub.sub1+"<\/td>\r\n<td>"+data_dump.sub1+"<\/td>\r\n<\/tr>\r\n<tr>\r\n<td>"+data_dump.prev_sub.sub2+"<\/td>\r\n<td>"+data_dump.sub2+"<\/td>\r\n<\/tr>\r\n<tr>\r\n<td>"+data_dump.prev_sub.sub3+"<\/td>\r\n<td>"+data_dump.sub3+"<\/td>\r\n<\/tr>\r\n<tr>\r\n<td>"+data_dump.prev_sub.sub4+"<\/td>\r\n<td>"+data_dump.sub4+"<\/td>\r\n<\/tr>\r\n<tr>\r\n<td>"+data_dump.prev_sub.sub5+"<\/td>\r\n<td>"+data_dump.sub5+"<\/td>\r\n<\/tr>\r\n<\/tbody>\r\n<\/table>\r\n<\/div>\r\n<\/div>\r\n<\/div>\r\n<hr class=\"my-3\">\r\n<div class=\"options\">\r\n<h4 class=\"text-center my-2\">Options Selected<\/h4>\r\n<div class=\"row bg-dark text-light my-2  text-center mx-3\">\r\n<label class=\"col-form-label col-md-1\">Order<\/label>\r\n<label class=\"col-form-label col-md-6\">Course<\/label>\r\n<label class=\"col-form-label col-md-5\">Action<\/label>\r\n<\/div>\r\n<div class=\"row  my-2  text-center  border mx-3\">\r\n<label class=\"col-form-label col-md-1\">1<\/label>\r\n<label class=\"col-form-label col-md-6\">"+option1+"<\/label>\r\n<label class=\"col-form-label col-md-5\"><button onclick=\"admit("+c+","+data_dump.req.option_1+")\" class=\"btn btn-primary  btn-sm mx-1\" value=\""+data_dump.req.option_1+"\">Approve<\/button><\/label>\r\n<\/div>\r\n<div class=\"row border my-2  text-center mx-3\">\r\n<label class=\"col-form-label col-md-1\">2<\/label>\r\n<label class=\"col-form-label col-md-6\">"+option2+"<\/label>\r\n<label class=\"col-form-label col-md-5\"><button class=\"btn btn-primary btn-sm mx-1\"  onclick=\"admit("+c+","+data_dump.req.option_2+")\" value=\""+data_dump.req.option_2+"\">Approve<\/button><\/label>\r\n<\/div>\r\n<\/div>\r\n\r\n\r\n\r\n<hr>\r\n<div class=\"mark\">\r\n<div class=\"row mx-3\">\r\n<label class=\"col-form-label col-md-3\">Date Of Submission:<\/label>\r\n<label class=\"col-form-label col-md-6\">"+data_dump.req.timelog+"<\/label>\r\n    <\/div>\r\n     <\/div>");
           }
       });
    }
}
 
 function admit(id,cs)
 {
    if(id!=='' && cs!=='')
    {
        $.ajax({
            url:'/dashboard/getReq',
            type:'POST',
            data:{
                type:201,
                id:id,
                course:cs
            },
            cache:false,
            success:function(dataRes){
                var res=JSON.parse(dataRes);
                if(res.stat)
                {
                    alert('Student Exist');
                }
                else
                {
                    location.reload();
                }
            }
        })
    }

 }


function deleteME(app_id)
{
    if(confirm("Confirm Deletion"))
    $.ajax({
        url:'/dashboard/getReq',
        type:'POST',
        data:{
            id:app_id,
            type:202
        },
        cache:false,
        success:function(dataRes){
            var res=JSON.parse(dataRes);
            if(res.stat)
            location.reload();
            else
            alert("Unable to delete the request");
        }
    });
}

</script>
</body>
</html>