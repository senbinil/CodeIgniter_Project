<hr>
  <div class=" wrapper container  " style="margin-top:300px; ">
      <h3 align="center" class="display-2">New User </h3>
      <p class="intro text-center py-4 ">Create an account starting with filling this form</p>

      <div class="form"  mt-4 text-center">
        <!-- <form class=" " action="/guest/register" method="post"> -->

            <div class="form-group mb-4 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Phone</label>
              <div class="col-sm-3">
                <input type="text"  class="form-control" required id="mobile" minlength="10" maxlength="10" placeholder="Mobile Number">
              </div>
              <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-3">
                <input type="email" class="form-control" required id="email"  placeholder="Email ID">
              </div>
            </div>
          <div class="my-3 d-flex justify-content-center">
            <button type="submit" type="button" id="register" value="Register" class="btn btn-danger btn-lg">Register</button>
          </div>
        <!-- </form> -->
      </div>
    </div>

    <script>
    console.log('Hello');
    $(document).ready(function(){
      $('#register').on('click',function(){
        var phone=$('#mobile').val();
        var email=$('#email').val();
        console.log(phone);
        if(phone!=="" && email!=="")
        {
          $.ajax({
            url:'/guest/register',
            type:'POST',
            data:{
              type:1,
              phone:phone,
              email:email
            },
            cache:false,
            success:function(result){
              var res=JSON.parse(result);
              console.log(res);
              if(res.stat==1)
              $('.container').html('<p class="display-3 text-center"> Registered Successfully , Check Email</p>');
              else
              alert('Failed to register,try again');
           }
          });
        }
        else
        alert('Plese Fill up the form');
      });
    });
    </script>