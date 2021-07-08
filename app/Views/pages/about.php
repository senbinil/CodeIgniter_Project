
  <div class="container " style="margin-top:100px;">
      <div class="row">
          <div class="col-sm-8">
              <h3 class="my-2">#About Us</h3>
              <p class="text-justify">The College of  Applied Science Perissery established in 2015, is affiliated to the University of Kerala and is  managed by the  Institute for Human Resources Development, Thiruvananthapuram, a Government of Kerala undertaking popularly known as the IHRD in the Kerala higher education sector.The college has a modest beginning with two First Degree Programmes in English and Commerce and two Career-related First Degree Programmes in Computer Application and Computer Science.  College of Applied Science,
                 Perissery is an affiliated institution of the University of Kerala and is managed by IHRD, a Govt. of Kerala institution.
                  </p>
                  <iframe width="100%" height="600"  class="my-4" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDXG-9f2p8DlTx7Vz661isFrdA_1hUpF7U&q=IHRD+Perissery+Chengannur+Kerala&zoom=13"></iframe>
                  <!-- <img src="asset/img/map.PNG" width="700px" style="overflow: hidden;" class="img-fluid mb-4" class="mb-4 col-sm-8" alt=""><br> -->
                  Courses  Affiliated to University of Kerala
                  <ul class="my-3">
                    <li>B.Sc Computer Science(30 seats) 3 year undergraduate programme</li>
                    <li>BCA (30 seats) 3 year undergraduate programme</li>
                  </ul>
                 <p>Admission to first semester degree programmes are conducted as per the guidelines of the University of Kerala during May-July every year.</p>
                 <div class="border border-dark p-3" id="contactme">
                   <h5>Contact us:
                   </h5>
                   <table>
                  <tr>
                      <td><span>Office Number</span></td>
                      <td>:</td>
                      <td class="pl-4"><a href="tel:0479-33213" class="btn btn-danger">0479-33213</a></td>
                  </tr>
                  <tr>
                      <td><span>Principal Number</span></td>
                      <td>:</td>
                      <td class="pl-4"><a href="tel:792333213" class="btn btn-danger">792333213</a></td>
                  </tr>
                  
                  <tr>
                      <td> <span>College Email</span></td>
                      <td>:</td>
                      <td class="pl-4"><a href="mailto:xyz@gmail.com" class="text-decoration-none">xyz@gmai.com</a></td>
                  </tr>
              
                   </table>
                  
  </div>
          </div>
          <div class="col-sm-4">
          <div class="wrapper">
             <h3 class="lead">Mail Us:</h3>
            
                <label for="email" class="col-form-label">Email Address:</label>
                <div class="">
                    <input type="email" name="emailid"  id="email_id" class="form-control" required autocomplete="off"  >
                </div>
                <label for="input">Message:</label>
                <textarea name="msg" cols="30"  id="message" class="form-control" aria-autocomplete="false" rows="5" required></textarea>
                <center><button class="btn btn-primary mt-3" id="log">Submit</button></center>
            
             </div>
          </div>
      </div>
  </div>

<hr>
<script>
$(document).ready(function(){
    $('#log').on('click',function(){
        var user=$('#email_id').val();
        var msg=$('#message').val();
        if(user!=="" && msg!=="")
        {
            $.ajax({
                url:"/user/suggestion",
                type:"POST",
                data:{
                    type:1,
                    id:user,
                    message:msg
                },
                cache:false,
                success:function(dataResult){
                var dataresult=JSON.parse(dataResult);
                    if(dataresult.stat)
                    $('.wrapper').html('<p class="display-4 text-danger float-right ">Suggestion submitted!</p>');
                    else
                    alert("Error");
                }
            });
        }
    });
});
</script>