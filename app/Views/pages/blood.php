<div class="container" style=" margin-top:200px;height:100vh">
<div class="content ">
      <!-- row div 2 col-6  -->
      <div class="row">
        <p class="lead mx-2  ">* Stricty for medical emergency . If improper usage of this service found legal actions will be taken</p>
        <div class="col-md-6 my-2">
          <div class=" bg-light py-3 text-dark search">
            <h4 class="mx-2"><i class="fa fa-search mx-1"></i>Find</h4>
            <hr class="my-4">
            <div class="input-group d-flex justify-content-center ">
              <input type="text" class="form-control text-center mx-4" maxlength="2" minlength="1" placeholder="Enter the blood group" name="" id="bgroup">
            </div>
            <div class="d-flex justify-content-center my-4">
              <button type="button" class="btn btn-primary" onclick="fetch()" name="button">Search</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 my-2">
          <div class="result bg-light py-3 text-dark px-2" id="results">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Semester</th>
                </thead>
                <tbody id="StudentD">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="subContent" style="margin-top:200px; margin-bottom:100px;">
      <p class="lead contact">In case match found please get in touch with college office regarding student availablity</p>
      <div class="card bg-transparent">
        <div class="card-body text-center">
          <span class="display-4 my-4 ">Contact</span><br>
          <button class="btn  btn-secondary mr-4 text-white">0479-123232</button>
          <button class="btn  btn-light mr-4 text-dark">0479-123232</button>
        </div>
      </div>
    </div>
</div>

<style>
body{
    background: #ff0084;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #33001b, #ff0084);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #33001b, #ff0084); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */color:white;"
}
#results{
  display:none;
}
</style>


<script>
function fetch(){
  $("#results").show();
  $("#StudentD").html("&nbsp;");
    var x=$("#bgroup").val();
    if(x!="")
    {
       $.ajax({
           url:"/user/suggestion",
           type:'POST',
           data:{
               bgroup:x,
               type:3
           },
           cache:false,
           success:function(data){
              var x=JSON.parse(data);
              if(x.stat==0)
              alert("No Result Found");
              else
              {
                  for(var i=0,j=1;i<x.student.length;i++,j++)
                  $("#StudentD").append("<tr><td>"+j+"</td><td>"+x.student[i]['fname']+" "+x.student[i]['lname']+"</td><td>"+x.cs[i]['course_name']+"</td><td>"+x.student[i]['semester']+"</td></tr>")
              }
           }
       })
    }
    else
    {
        alert('Invalid Input');
    }
}
</script>