<div class="content my-4 ">
  <div class="container bg-light">
    <h4 class="my-3 pt-4">Profile Info:</h4>
    <hr>
    <div class="row ">
      <label for="" class="col-md-2 col-sm-3 col-form-label">Employee ID:</label>
      <input id="user_id" disabled class="text-center col-sm-2 col-form-label" value="<?= $emp_id?>"></input>
      <label for="" class="col-sm-2  col-md-2 col-form-label">Name:</label>
      <label for="" class="col-sm-5 col-md-2 col-form-label">
        <?=$emp_name?>
      </label>
      <label for="" class="col-sm-2 col-md-2 col-form-label">Mobile:</label>
      <label for="" class="col-sm-4  col-md-2 col-form-label">
        <?= $mobile?>
      </label>
    </div>
    <hr>
    <div class="row ">
      <label for="" class="col-sm-2 col-md-2 col-form-label">Email:</label>
      <label for="" class="col-md-2 col-sm-5 col-form-label">
        <?=$email?>
      </label>
      <label for="" class="col-sm-2 col-form-label">Address:</label>
      <label for="" class="col-sm-2 col-md col-form-label">
        <?=$caddress?>
      </label>
    </div>
    <hr>
    <div class="row">
      <label for="" class="col-sm-2 col-form-label">Education:</label>
      <label for="" class="col-sm col-form-label">
        <?=$education?>
      </label>
      <label for="" class="col-sm-2 col-form-label">Employee type:</label>
      <label for="" class="col-sm-2 col-form-label">
        <?=$emp_type?>
      </label>
    </div>
    <hr>
    <div class="row">
      <label for="" class="col-sm-2 col-form-label">Designation:</label>
      <label for="" class="col-sm-2 col-form-label">
        <?=$desig_name['pos_name']?>
      </label>
      <label for="" class="col-sm-2 col-form-label">Joining Date:</label>
      <label for="" class="col-sm-2 col-form-label">
        <?=$j_date?>
      </label>
      <label for="" class="col-sm-2 col-form-label">Salary:</label>
      <label for="" class="col-sm-2 col-form-label">
        <?=$desig_name['salary']?>
      </label>
    </div>
    <hr>
    <h5 class="mb-3">Account Details</h5>
    <div class="row">
      <label for="" class="col-sm-3 col-form-label">Account No:</label>
      <label for="" class="col-sm-4 col-form-label">
        <?=$acc_no?>
      </label>
      <label for="" class="col-sm-2 col-form-label">Bank Name:</label>
      <label for="" class="col-sm-3 col-form-label">
        <?=$bank_name?>
      </label>
    </div>
    <div class="row">
      <label for="" class="col-sm-3 col-form-label">IFSC:</label>
      <label for="" class="col-sm col-form-label">
        <?=$ifsc?>
      </label>
    </div>
    <hr>

    <h5 class="my-3">Salary Credited Details</h5>
    <div class="row container">
      <label for="" class="col-form-label col-sm-3">Last Salary credited details:</label>
      <label for="" class="col-sm-5 col-form-label bg-success text-white">
        <?php if(isset($lastsal))echo  $lastsal['pay_id']." ".$lastsal['month']." "." ". $lastsal['pay_time']; else echo ""; ?>
      </label>
    </div>
    <div class=" my-3 table-responsive">

      <table class="table">
        <thead class="bg-light text-black">
          <tr>
            <th scope="col">Payment Id</th>
            <th scope="col"> Salary</th>
            <th scope="col">Month</th>
            <th scope="col">Payment Time</th>
          </tr>
        </thead>
        <tbody class="text-dark">
          <?php
                    for($i=0;$i<count($salarydel);$i++)
                    echo "<tr><th scope=\"row\">".$salarydel[$i]['pay_id']."</th>"."<td>".$salarydel[$i]['sal']."</td>"."<td>".$salarydel[$i]['month']."</td>"."<td>".$salarydel[$i]['pay_time']."</td></tr>";

?>
        </tbody>
      </table>

    </div>
    <div class=" mt-sm-2">
        <h4 class="  py-2"> Library</h4>
        <hr >
        <div class="row text-dark mx-4">
          <ul>
            <li class="navbar-item my-4"><i class="fa fa-folder-open"></i> <a
                href="/common/resources/library" class="text-dark text-decoration-none">Browse</a> </li>
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
<script>
  $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("#cat").on("click",function(){
        var x=$("#cat option:selected").val();
        console.log(x);
        if(x=="")
        {
            alert("Please select a category");
            $("#sub").addClass("disabled");
        }
        else
        $("#sub").removeClass("disabled");

    });

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
            console.log(time_dump);
            for (i = 0; i < time_dump[0].length; i++) {
              $("#time_machine_dump").append("<tr><th scope=\"row\">" + time_dump[0][i].time_jumpid + "</th>" + "<td class=\"timelog\">" + time_dump[0][i].timelog + "</td>" + "</tr>");
            }
          }
        });
      }
    });
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