<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest</title>

    <link href="<?= base_url();?>/asset/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js"></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/asset/css/common.css">
    <style>
        header {
            width: 100%;

        }

        .timelog {
            font-size: 20px;
            font-weight: bolder;
        }
    </style>

</head>

<body style="background: #ff00cc;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #333399, #ff00cc);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #333399, #ff00cc); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <header class="px-3 text-white  py-4 ">
        <h2 class="display-4">#Profile</h2>
    </header>
    <nav class="navbar   navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark d-inline-block d-md-none ml-auto" type="button" data-toggle="collapse"
                data-target="#content" aria-controls="content" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-angle-double-down " style="font-size:20px;"></i>
            </button>

            <div class="collapse navbar-collapse " id="content">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item  mx-4">
                        <button type="button nav-link" class="btn btn-danger" data-toggle="modal" id="fetch_log"
                            data-target="#timemachine">Time Machine <i class="fa fa-history"></i></button>
                    </li>
                    <li class="nav-item username dropdown active  bg-light mx-4 ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-user mx-2"></i><span>Guest</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="/logout/guest" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="timemachine" tabindex="-1" role="dialog" aria-labelledby="timemachine" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">
                        Recent Login
                    </h5>
                    <button class="close" data-dismiss="modal" aria-label="close"> <span
                            aria-hidden="true">&times;</span></button>
                </div>


                <div class="modal-body">
                    <div class="content">
                        <div class=" my-3 table-responsive">

                            <table class="table">
                                <thead class="bg-light text-black">
                                    <tr>
                                        <th scope="col">Log ID</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody id="time_machine_dump" class="text-dark">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<div class="container-fluid text-white my-5 py-3 cont  ">
  <h3 class="my-3">Basic Details</h3>
  <hr>
  <div class="row pl-2">
      <div class="col-md-8">
          <div class="row  py-2 w-50">
            <label for="name" class="col-sm-4">Guest ID:</label> <input id="user_id" disabled class="col-sm-2 form-control bg-dark text-light text-center" value="<?=$_SESSION['gid']?>">
          </div>
          <hr>
          <div class="row">
            <label for="name" class="col-sm-2">First Name:</label> <span class="col-md-4"><?=$fname?></span>
            <label for="name" class="col-sm-2">Last Name:</label> <span class="col-md-4 col-sm-12"><?=$lname?></span>
          </div>
          <hr>
          <div class="row">
            <label for="" class="col-sm-2 col-form-label">Email-ID:</label>
            <span class="col-sm-4 col-form-label"><?=$email?></span>
            <label for="" class="col-md-2 col-sm-12 col-form-label">Phone :</label>
            <span class="col-md-4 col-sm-12 col-form-label"><?=$phone?></span>
          </div>
          <hr>
          <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Date Of Birth</label>
            <span class="col-sm-4 col-form-label"><?=$dob?></span>
          </div>
          <hr>
          <h5>Academic Details</h5>
          <hr>
          <div class="prevcourse">
            <div class="row">
              <label for="" class="col-sm-2 col-form-label">Year Of Pass:</label>
              <span class="col-sm-4 col-form-label"><?=$year_pass?></span>
              <label for="" class="col-sm-2 col-form-label">Previous Stream:</label>
              <span class="col-sm-4 col-form-label"><?=$prevstream['category']?></span>
            </div>
            <div class="row">
              <label for="" class="col-sm-2 col-form-label">Course:</label>
              <span class="col-sm-4 col-form-label"><?=$pcourse['name']?></span>
            </div>

            <div class="row justify-content-md-center my-4  ">
              <div class="table-responsive-md col-md-4 ">
                <table class="table bg-light text-primary table-borderless   table-hover ">
                  <caption class="text-danger">Mark Based on Index Mark</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Mark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><?=$pcourse['sub1']?></td>
                      <td><?=$sub1?></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td><?=$pcourse['sub2']?></td>
                      <td><?=$sub2?></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td><?=$pcourse['sub3']?></td>
                      <td><?=$sub3?></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td><?=$pcourse['sub4']?></td>
                      <td><?=$sub4?></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td><?=$pcourse['sub5']?></td>
                      <td><?=$sub5?></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
      </div>
        <div class="col-md-4 mt-sm-2">
          <div class=" rounded   text-light" style="background-image: radial-gradient( circle farthest-corner at 10.9% 80.2%,  rgba(255,124,0,1) 0%, rgba(255,124,0,1) 15.9%, rgba(255,163,77,1) 15.9%, rgba(255,163,77,1) 24.4%, rgba(19,30,37,1) 24.5%, rgba(19,30,37,1) 66% );">
            <h4 class=" text-center text-center py-2"> Library</h4>
            <hr class="bg-white">
            <div class="row  text-dark mx-4">
              <ul>
                <li class="nav-link my-4"><h5><i class="fa fa-folder-open text-white"></i> <a href="/common/resources/library" class="text-white">Browse</a></h5> </li>
              </ul>
            </div>
            <hr class="bg-white">
        <div class="fileLoad text-center py-4">
          <div class="row d-flex justify-content-center  my-3 py-4 mx-2">
            <label class="col-form-label col-md-2">File Description:</label>

            <div class="col">
              <textarea name="fileintro" class="form-control" required minlength="20" id="filedes" cols="30"
                rows="2"></textarea>
            </div>
          </div>
          <div class="row d-flex justify-content-center my-3">
            <select name="cat" class="form-control  required col-md-6" required id="cat">
              <option value="" selected>Select the category of upload</option>
              <option value="1">Notes</option>
              <option value="2">Syllabus</option>
              <option value="3">Book</option>
              <option value="4">Other</option>
            </select>
          </div>
          <div class="row d-flex text-left justify-content-center">
            <div class="custom-file col-md-6 mx-3 my-0">
              <input type="file" required class="custom-file-input" name="filetoload" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="row my-3 py-4 d-flex justify-content-center">
            <input type="submit" name="" value="Submit" id="sub" class="btn btn-danger">
          </div>
        </div>
          </div>
        </div>
  </div>
<hr class="py-1 bg-light">
  <div class="  mx-2" style="padding-bottom:300px;">
  <h4 align="center">ADMISSION PORTAL</h4>
    <div class=" mt-4" id="admissionstat">
    <div class="d-flex justify-content-around "><button class="btn btn-primary px-4 btn-lg" onclick="adshow()">UG</button></div>
    </div>
  </div>

  
           <script>
                $(document).ready(function(){
                    $('#fetch_log').on('click',function(){
                        var id=$('#user_id').val();
                        if (id !== '') {
                            $.ajax({
                                url: '/user/log_fetch',
                                type: 'POST',
                                // dataType:'JSON',
                                data: {
                                    type: 1,
                                    user_id: id
                                },
                                cache: false,
                                success: function (dataResult) {
                                  console.clear();
                                    var time_dump = JSON.parse(dataResult);
                                    for (i = 0; i < time_dump[0].length; i++) {
                                        $("#time_machine_dump").append("<tr><th scope=\"row\">" + time_dump[0][i].time_jumpid + "</th>" + "<td class=\"timelog\">" + time_dump[0][i].timelog + "</td>" + "</tr>");
                                    }
                                }
                            });
                        }
                    });
                });
                function adshow()
                {
                  $.ajax({
                          url:'/guest/infofetch',
                          type:'POST',
                          data:{
                            type:1
                          },
                          cache:false,
                          success:function(dataResult){
                            console.clear();

                            var temp=JSON.parse(dataResult);
                            if(temp!==null)
                            {
                              $('#admissionstat').html(" <form><div id=\"portalContent\" class=\" container d-flex justify-content-center \">\r\n     <div class=\"table-responsive  bg-light  \">\r\n      <table class=\"  table \">\r\n        <thead>\r\n          <tr>\r\n            <th scope=\"col\">#<\/th>\r\n            <th scope=\"col\">Course<\/th>\r\n          <\/tr>\r\n        <\/thead>    \r\n  <tbody>\r\n    <tr>\r\n      <th scope=\"row\">1<\/th>\r\n      <td ><select class=\"form-control\" name=\"pref1\" id=\"pref1\"><option value=\"0\" selected disabled>Select a  Course<\/select><\/td>\r\n    <\/tr>\r\n    <tr>\r\n      <th scope=\"row\">2<\/th>\r\n      <td><select class=\"form-control\" name=\"pref2\" id=\"pref2\"><option value=\"0\" selected disabled>Select a  Course<\/select><\/td>\r\n    <\/tr>\r\n    <\/tbody>    <\/table>\r\n    <\/div>\r\n <button type=\"button\" onclick=\"logMe()\" class=\"btn btn-danger round\">Submit<\/button> <\/div><\/form>");
                              for (i = 0,count=1; i < temp.length; i++,count++)
                               {  
                                  $("#pref1").append("<option value="+temp[i].course_id+">"+temp[i].Course);
                                  $("#pref2").append("<option value="+temp[i].course_id+">"+temp[i].Course);
                                }
                              }
                              else 
                              $("#admissionstat").html("<span class=\"lead\">Not available<\/span>");
                          }
                        });
                        console.clear();

                }

                function logMe()
                {
                  var opt1=document.getElementById('pref1').value;
                  var opt2=document.getElementById('pref2').value;
                  var guest_id=document.getElementById('user_id').value;
                  if(opt1==0 || opt2==0)
                  alert("Select a valid option and try again");
                  else
                  {
                    //submitting application through ajax
                    $.ajax({
                      url:'/guest/infofetch',
                      type:'POST',
                      data:{
                        option_1:opt1,
                        option_2:opt2,
                        type:2,
                        guest_id:guest_id

                      },
                      cache:false,
                      success:function(dataRes){
                        console.clear();
                        var stat=JSON.parse(dataRes);
                        if(stat.stat==0)
                        $("#admissionstat").html('<span class=\"display-2 d-flex justify-content-center\"> Application Already Exist<\/span>')
                        else if(stat.stat)
                        $("#admissionstat").html("<span class=\"display-2 d-flex justify-content-center\"> Application  Submitted:"+stat.app_no+"<\/span>");
                        else
                        $("#admissionstat").html('<span class=\"display-2 d-flex justify-content-center\"> Error occurred<\/span>')
                      }
                    })
                  }

                }
                $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });



  $("#cat").on("click", function () {
    var x = $("#cat option:selected").val();
    if (x == "") {
      alert("Please select a category");
      $("#sub").addClass("disabled");
    }
    else
      $("#sub").removeClass("disabled");

  });

  $('#sub').on('click', function () {
    var fileIntro = $('#filedes').val();
    var x = $("#cat option:selected").val();
    var files = $('.custom-file-input').prop('files')[0];
    if (fileIntro == "" || x == "" || files == "")
      alert('Please Fill the submission form');
    else {
      var form_data = new FormData();
      form_data.append('file', files);
      form_data.append('fileIntro', fileIntro);
      form_data.append('cat', x);
      form_data.append('type', 501);
      $.ajax({
        url: '/library/useraddFile',
        type: 'post',
        data: form_data,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
          var res = JSON.parse(data);
          switch (res.stat) {
            case 1: $('.fileLoad').html('<span class=" text-danger display-4">File Submitted</span>');
              break;
            case 0: $('.fileLoad').html('<span class=" text-danger display-4">Invalid Format</span>');
              break;
            case -1: $('.fileLoad').html('<span class=" text-danger display-4">File Exist</span>');
              break;
          }
        }
      });
    }
  });
            </script>
</body>
</html>