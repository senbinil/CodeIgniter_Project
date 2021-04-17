<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Guest</title>
    <script src="<?= base_url();?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url();?>/asset/js/bootstrap.min.js" ></script>
    <link href="<?= base_url();?>/asset/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="/asset/css/common.css">
</head>
<style media="screen">
  .wrapper{
    margin-top:100px;
  }
  .content{
    margin-left:80px;
    margin-right:80px;

  }
</style>
<body style="background-color: #4158D0;
background-image: linear-gradient(0deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">

<div class="display-4 mx-4 text-white">
#Welcome Back ! <hr class="bg-white">
</div>
<div class="wrapper">
  <div class="sec">
  <h3 class="text-center text-white display-4 my-4">Fill up</h3>
  <div class="d-flex justify-content-end my-2" style="margin-left:60px;margin-right:60px;"><button class="btn btn-lg btn-danger mx-4 text-white"><a class="nav-item text-white" href="/logout">Logout</a></button></div>
  </div>
  <div class="content  text-white border rounded p-4">
    <form action="/guest/completeRegistration" class="validator"  method="POST">
      <div class="tabs">
        <h4 class="text-center mb-4">Personal Details</h4><hr class="bg-white">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" class="form-control text-center" required  placeholder="First Name" name="fname" id="">
              <div class="row my-1 mb-2 d-flex justify-content-center">
                <label for="gender" class="form-label mx-3">Gender:</label>
                <div class="form-check">
                <input class="form-check-input" type="radio"  name="gender" value="Male" required  >
                <label class="form-check-label" for="">
                  Male
                </label>
                </div>
                <div class="form-check mx-1">
                <input class="form-check-input" type="radio" name="gender" value="Female" required>
                <label class="form-check-label" for="">
                  Female
                </label>
                </div>
              </div>
              <input type="text" placeholder="Date Of Birth" required  class="form-control text-center my-1" name="dob">
              <input type="text" placeholder="State"  required class="form-control text-center my-1" name="state">
              <input type="text" placeholder="Pincode" required class="form-control text-center my-1" onkeypress="return onlyNumberKey(event)" name="pin">
              <input type="text" placeholder="Guardian Last Name" required class="form-control text-center my-1" name="glname">
            </div>
          </div>

          <div class="col-md-6 col-sm-12 mt-0">
            <div class="form-group">
              <input type="text" class="form-control text-center" required  placeholder="Last Name" name="lname" id="">
              <select class="form-control text-center my-1" required name="blood">
                <option value="init"  disabled selected>Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
              <input type="text" placeholder="Address" required  class="form-control text-center my-1" name="address">
              <input type="text" placeholder="City" required  class="form-control text-center my-1" name="city">
              <input type="text" placeholder="Guardian First Name" required  class="form-control text-center my-1" name="gfname">
               <select class="form-control" required name="relation">
                 <option value="init" disabled selected>Relation with Guardian</option>
                 <option value="Father">Father</option>
                 <option value="Mother">Mother</option>
                 <option value="Bother">Brother</option>
                 <option value="Sister">Sister</option>
                 <option value="Other">Other</option>
               </select>
            </div>
          </div>
        </div>
        <hr class="bg-white">
      </div>


      <div class="tabs">
        <h4 class="text-center">Academic</h4>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <input type="text" placeholder="Registration Number" onkeypress="return onlyNumberKey(event)" required class="form-control text-center my-1" name="regno">
              <select class="form-control my-1" id="hsccat" required name="hscat">
                <option value="init" disabled selected>Category</option>
              </select>
              <div class="subject">
              
              </div>
              <!-- <select class="form-control my-1" id="subject" name="syllabus">
                <option value="init" disabled selected>Select Subject</option>
              </select> -->
            </div>
          </div>
          <div class="col-md-6 col-sm-12 mt-0">
            <div class="form-group">
              <select class="form-control my-1" required name="ypass">
                <option value="init" disabled selected>Year Of Pass</option>
                <?php
                $i=1980;
                while($i<2021)
                {
                  echo "<option value=\"$i\">$i</option>";
                  $i++;
                }

?>
              </select>
              <select class="form-control my-1" required id="syllabus" name="prevsyllabus">
                <option value="init" disabled selected>Select Syllabus</option>
              </select>
            </div>
          </div>
        <!-- <div class="row"> -->

          <div class="col-md-6 ">
            <!-- <div class="container"> -->
            <h4>Enter Marks</h4>
            <hr class="bg-light">
            <div class="markContent">
              <div class="row">
              <span id="sub1" class="col-form-label col-3"></span>
                <div class="form-group ">
                  <input type="text"  class="form-control text-center" required onkeypress="return onlyNumberKey(event)" name="sub1" maxlength="1" minlength="1">
                </div>
              </div>
              <div class="row">
              <span id="sub2" class="col-form-label col-3"></span>
                <div class="form-group ">
                  <input type="text"  class="form-control text-center" required onkeypress="return onlyNumberKey(event)" name="sub2"maxlength="1" minlength="1">
                </div>
              </div>
              <div class="row">
              <span id="sub3" class="col-form-label col-3"></span>
                <div class="form-group">
                  <input type="text"  class="form-control text-center" required onkeypress="return onlyNumberKey(event)" name="sub3" maxlength="1" minlength="1">
                </div>
              </div>
              <div class="row">
              <span id="sub4" class="col-form-label col-3"></span>
                <div class="form-group w-40">
                  <input type="text"  class="form-control text-center " required onkeypress="return onlyNumberKey(event)" name="sub4" maxlength="1" minlength="1">
                </div>
              </div>
              <div class="row">
              <span id="sub5" class="col-form-label col-3"></span>
                <div class="form-group w-40">
                  <input type="text"  class="form-control text-center " required onkeypress="return onlyNumberKey(event)" name="sub5" maxlength="1" minlength="1">
                </div> 
          </div>
          </div>
          </div>
        <div class="col-md-6">
          <h4 class="py-2 text-center">Grade Point Chart</h4>
          <div class="content bg-light  text-dark">
            <table class="table text-center  table-dark">
              <thead>
                <tr>
                  <th scope="col">Grade</th>
                  <th scope="col">Grade Points</th>
                  <th scope="col">Grade</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">A+</th>
                  <td>10</td>
                  <td>A1</td>
                </tr>
                <tr>
                  <th scope="row">A</th>
                  <td>9</td>
                  <td>A2</td>
                </tr>
                <tr>
                  <th scope="row">B+</th>
                  <td>8</td>
                  <td>B1</td>
                </tr>
                <tr>
                  <th scope="row">B</th>
                  <td>7</td>
                  <td>B2</td>
                </tr>
                <tr>
                  <th scope="row">C+</th>
                  <td>6</td>
                  <td>C1</td>
                </tr>
                <tr>
                  <th scope="row">C</th>
                  <td>5</td>
                  <td>C2</td>
                </tr>
                <tr>
                  <th scope="row">D+</th>
                  <td>4</td>
                  <td>D1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
        <hr class="bg-white">
      </div>






      <div style="overflow:auto;">
      <div class="d-flex justify-content-end">
      <input type="reset" value="Reset" class=" mx-3 btn btn-light">
      <div class="mx-1" id="replace">
      <input type="submit" value="Submit" class="btn btn-danger">
      </div>
      </div>
      </div>
    </form>
  </div>
</div>





<script src="/asset/js/popper.min.js"></script>
<script>


  // var currentTab=0;
  // showTab(currentTab);


  // function showTab(n)
  // {
  //   var x=document.getElementsByClassName("tabs");
  //   console.log(x);
  //   var i;
  //   for(i=0;i<x.length;i++)
  //   x[i].style.display="none";
  //   x[n].style.display="block";

  //   if (n==0)
  //   document.getElementById("prevBtn").style.display="none";
  //   else
  //   document.getElementById("prevBtn").style.display="inline";
  //   if(n==(x.length-1))
  //   document.getElementById("replace").innerHTML = "<button type=\"submit\"class=\"btn btn-danger\">Submit</button>";
  //   else
  //   document.getElementById("replace").innerHTML = "  <button type=\"button\" id=\"nextBtn\" class=\"btn btn-primary\" onclick=\"nextPrev(1)\">Next</button>";

  //   // document.getElementById("nextBtn").innerHTML = "Next";
  //   <!-- fixStepInd(n); -->
  // }

  // function nextPrev(n)
  // {
  //   var x=document.getElementsByClassName("tabs");
  //   x[currentTab].style.display="none";
  //   currentTab+=n;
  //   if(currentTab>=x.lenght)
  //   return false;
  //   showTab(currentTab);
  // }
function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    $(document).ready(function(){
        $.ajax({
          url:'/guest/csfetch',
          type:'POST',
          data:{type:1},
          cache:false,
          success:function(res){
            var data=JSON.parse(res);
            // console.log(data[0]['UID']);
            for(var i=0;i<data.length;i++)
            $("#hsccat").append('<option value='+data[i]['UID']+">"+data[i]['category']+'</option>')
          }
        })
    })

    $(document).ready(function(){
        $.ajax({
          url:'/guest/csfetch',
          type:'POST',
          data:{type:2},
          cache:false,
          success:function(res){
            var data=JSON.parse(res);
            for(var i=0;i<data.length;i++)
            $("#syllabus").append('<option value='+data[i]['CID']+">"+data[i]['Name']+'</option>')
          }
        })
  
    })
    $(document).ready(function(){
      $('#hsccat').change(function(){
        var cat=$('#hsccat option:selected').val();
        console.log(cat);
        $('.subject').html("<select class=\"form-control my-1\" id=\"prevsubject\" name=\"prevcourse\">"+'<option value=\"init\" disabled selected>Select Subject</option></select>');
        $.ajax({
          url:'/guest/csfetch',
          type:'POST',
          data:{type:3,
          cat:cat},
          cache:false,
          success:function(res){
            var data=JSON.parse(res);
            console.log(data[0]['name']);
            // console.log(data[0]['UID']);
            for(var i=0;i<data.length;i++)
            $("#prevsubject").append('<option value='+data[i]['CSID']+">"+data[i]['name']+'</option>')
          }
        });
        $('#prevsubject').change(function(){
        var cat=$('#prevsubject option:selected').val();
        $.ajax({
          url:'/guest/csfetch',
          type:'POST',
          data:{type:4,
          cat:cat},
          cache:false,
          success:function(res){
            console.log(res);
            var data=JSON.parse(res);
            $("#sub1").html('<label>'+data[0]['sub1']+'</label>');
            $("#sub2").html('<label>'+data[0]['sub2']+'</label>');
            $("#sub3").html('<label>'+data[0]['sub3']+'</label>');
            $("#sub4").html('<label>'+data[0]['sub4']+'</label>');
            $("#sub5").html('<label>'+data[0]['sub5']+'</label>');

        //     // for(var i=0;i<data.length;i++)
          }
        });
      });
      });
      });
 


</script>
</body>
</html>
