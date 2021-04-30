<div class="container " style="margin-top:220px;padding: 100px;border-radius: 30px; height:100vh">
  
<section class="p-4" style="background-color: #00ff99;">
<h2 class="text-center pb-4">Login</h2>
  <div class="container">
            <form  action="/login/guest" method="post">
                <div class="row form-group d-flex justify-content-center ">
                  <input type="text" name="username" class="form-control col-md-6" placeholder="Username" required onkeypress="return onlyNumberKey(event)" minlength="3">
                </div>
                <div class="form-group d-flex justify-content-center row ">
                  <input type="password" name="password" class="form-control col-md-6" id="password" maxlength="50" required onkeypress="return onlyNumberKey(event)" minlength="8" placeholder="Password" value="">
                </div>
                <div class="form-check form-check-inline d-flex justify-content-center">
                  <input type="checkbox" class="form-check-input" id="showpass" onclick="toggle()">
                  <label class="form-check-label" for="showpass">Show Password</label>
                </div>
              <div class="row justify-content-center">
                <span class="pr-4 mt-4"><small><a href="/register/guest-register" class="text-dark">Create an account</a></small></span>

                <!-- <span class="pr-4 mt-4"><small><a href="" class="text-dark">Forgot Password</a></small></span> -->
              </div>
              <div class="my-3 d-flex justify-content-center">
                <input type="submit" value="Login" class="btn btn-dark btn-lg">
              </div>
            </form>
          </div>
</section>
</div>


<script type="text/javascript">
function onlyNumberKey(evt) {

// Only ASCII charactar in that range allowed
var ASCIICode = (evt.which) ? evt.which : evt.keyCode
if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
return true;
}
  function toggle(){
    var temp=document.getElementById('password');
    if(temp.type=="password")
      temp.type="text";
    else
    temp.type="password";
  }
</script>