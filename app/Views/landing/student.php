<div class="container-fluid my-5 py-3 cont  bg-white">
  <h3 class="my-3">Basic Details</h3>
  <hr>
  <div class="row pl-2">
    <div class="col-md-8">
      <?php
    //     $adm=$row['admin_no'];
    // $sqlcs="select course_name , no_sem from ugcourse where course_id=(select ug_course from studentenroll where admin_no=$adm)";
    // $res=mysqli_query($conn,$sqlcs);
    // $rows=mysqli_fetch_assoc($res);

?>
      <div class="row  py-2  w-50">
        <label for="name" class="col-sm-4">Admission Number:</label> <input id="user_id" disabled
          class="col-sm-2 form-control bg-light text-dark" value="<?=$admin_no?>">
      </div>
      <hr>
      <div class="row">
        <label for="name" class="col-sm-2">First Name:</label> <span class="col-md-4">
          <?=$fname?>
        </span>
        <label for="name" class="col-sm-2">Last Name:</label> <span class="col-md-4 col-sm-12">
          <?=$lname?>
        </span>
      </div>
      <hr>
      <div class="row">
        <label for="" class="col-sm-2 col-form-label">Email-ID:</label>
        <span class="col-sm-4 col-form-label">
          <?=$e_mail?>
        </span>
        <label for="" class="col-md-2 col-sm-12 col-form-label">Phone :</label>
        <span class="col-md-4 col-sm-12 col-form-label">
          <?=$gphone?>
        </span>
      </div>

      <hr>
      <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Course opted:</label>
        <span class="col-sm-4 col-form-label">
          <?=$course_dump['course_name'] ?>
        </span>
        <label for="" class="col-sm-2 col-form-label">Course Duration:</label>
        <span class="col-sm-4 col-form-label">
          <?=$course_dump['no_sem']?>
        </span>
      </div>
      <hr>
      <div class="row alert alert-dark" role="alert">
        <h5>Note:</h5>
        <p class="text-danger mx-5">
          <?=$remark?>
        </p>
      </div>
      <hr>
      <div class="row ">
        <h3>Course details</h3>
      </div>

      <div class="row bg-light ">
        <!--Section: Content-->
        <section class="   p-5 rounded">

          <div class="row">

            <div class="col-md-4 mb-4">
              <div class="row">
                <div class="col-6 pr-0 mx-3">
                  <h4 class="display-4 text-left mb-0 count-up" data-from="0" data-to="42" data-time="2000">
                    <?=$semester?>
                  </h4>
                </div>

                <div class="col-md-6">
                  <p class="text-uppercase font-weight-normal mb-1">Semester</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="row">
                <div class="col-6 pr-0 mx-3">
                  <h4 class="display-4 text-left mb-0 " id="stat"></h4>
                </div>

                <div class="col-6">
                  <p class="text-uppercase font-weight-normal mb-1">Fee Status</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="row">
                <div class="col-6 pr-0 mx-3">
                  <h4 class="display-4 text-left mb-0 ">
                    <?php if($semester<6) echo $semester+1; else echo "All Done!";?>
                  </h4>
                </div>

                <div class="col-6">
                  <p class="text-uppercase font-weight-normal mb-1">Upcomming Semester</p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="col-md-4 mt-sm-2">
      <div class="payment   text-white"
        style="background-image: radial-gradient( circle farthest-corner at 16.5% 28.1%,  rgba(15,27,49,1) 0%, rgba(0,112,218,1) 90% );">
        <h4 class=" text-center text-center py-2"> Library</h4>
        <hr class="bg-white">
        <div class="row text-dark mx-4">
          <ul>
            <li class="navbar-item my-4"><i class="fa fa-folder-open text-white"></i> <a
                href="/common/resources/library" class="text-white text-decoration-none">Browse</a> </li>
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

</div>

<script>
  $(document).ready(function () {
    $('#fetch_log').on('click', function () {
      var id = $('#user_id').val();
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
            var time_dump = JSON.parse(dataResult);

            for (i = 0; i < time_dump[0].length; i++) {
              $("#time_machine_dump").append("<tr><th scope=\"row\">" + time_dump[0][i].time_jumpid + "</th>" + "<td class=\"timelog\">" + time_dump[0][i].timelog + "</td>" + "</tr>");
            }
          }
        });
      }
    });
    var id = $('#user_id').val();
    var sem =<?= $semester ?>;
    $.ajax({
      url: '/user/log_fetch',
      type: 'POST',
      data: {
        type: 2,
        id: id,
        semester: sem
      },
      cache: false,
      success: function (result) {
        console.clear();
        var stat = JSON.parse(result)
        if (stat.stat)
          $('#stat').append('Paid')
        else
          $('#stat').append('Unpaid')

      }
    });
  });

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