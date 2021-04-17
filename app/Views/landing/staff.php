
    <div class="content ">
        <div class="container bg-light">
            <h4 class="my-3 pt-4">Profile Info:</h4>
            <hr>
            <div class="row ">
                <label for="" class="col-md-2 col-sm-3 col-form-label">Employee ID:</label>
                 <input id="user_id" disabled class="text-center col-sm-2 col-form-label" value="<?= $emp_id?>"></input>
                 <label for="" class="col-sm-2  col-md-2 col-form-label">Name:</label>
                 <label for="" class="col-sm-5 col-md-2 col-form-label"><?=$emp_name?></label>
                 <label for="" class="col-sm-2 col-md-2 col-form-label">Mobile:</label>
                 <label for="" class="col-sm-4  col-md-2 col-form-label"><?= $mobile?></label>
                 </div>
                 <hr>
                 <div class="row ">
                 <label for="" class="col-sm-2 col-md-2 col-form-label">Email:</label>
                 <label for="" class="col-md-2 col-sm-5 col-form-label"><?=$email?></label>
                 <label for="" class="col-sm-2 col-form-label">Address:</label>
                 <label for="" class="col-sm-2 col-md col-form-label"><?=$caddress?></label>
                </div>
    <hr>
            <div class="row">
                 <label for="" class="col-sm-2 col-form-label">Education:</label>
                 <label for="" class="col-sm col-form-label"><?=$education?></label>
                 <label for="" class="col-sm-2 col-form-label">Employee type:</label>
                 <label for="" class="col-sm-2 col-form-label"><?=$emp_type?></label>
            </div>
            <hr>
            <div class="row">
                 <label for="" class="col-sm-2 col-form-label">Designation:</label>
                 <label for="" class="col-sm-2 col-form-label"><?=$desig_name['pos_name']?></label>
                 <label for="" class="col-sm-2 col-form-label">Joining Date:</label>
                 <label for="" class="col-sm-2 col-form-label"><?=$j_date?></label>
                 <label for="" class="col-sm-2 col-form-label">Salary:</label>
                 <label for="" class="col-sm-2 col-form-label"><?=$desig_name['salary']?></label>
            </div>
            <hr>
            <h5 class="mb-3">Account Details</h5>
            <div class="row">
                <label for="" class="col-sm-3 col-form-label">Account No:</label>
                <label for="" class="col-sm-4 col-form-label"><?=$acc_no?></label>
                <label for="" class="col-sm-2 col-form-label">Bank Name:</label>
                <label for="" class="col-sm-3 col-form-label"><?=$bank_name?></label>
            </div>
            <div class="row">
                <label for="" class="col-sm-3 col-form-label">IFSC:</label>
                <label for="" class="col-sm col-form-label"><?=$ifsc?></label>
            </div>
            <hr>

            <h5 class="my-3">Salary Credited Details</h5>
            <div class="row container">
                <label for="" class="col-form-label col-sm-3">Last Salary credited details:</label>
                <label for="" class="col-sm-5 col-form-label bg-success text-white"><?php if(isset($lastsal))echo  $lastsal['pay_id']." ".$lastsal['month']." "." ". $lastsal['pay_time']; else echo ""; ?></label>
            </div>
            <div class=" my-3 table-responsive">
            
                    <table class="table">
                    <thead class="bg-light text-black">
                    <tr>
                    <th  scope="col">Payment Id</th>
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
<div class="payment   text-white" style="font-size:25px;height:300px;background-image: radial-gradient( circle farthest-corner at 16.5% 28.1%,  rgba(15,27,49,1) 0%, rgba(0,112,218,1) 90% );">
<h4 class=" text-center text-center py-2"> Library</h4>
<hr class="bg-white">
<div class="row text-dark mx-4">
<ul>
<li class="nav-link my-4"> <a href="" class="text-white">Browse</a> </li>
<li class="nav-link my-4 "><a href="" class="text-white">Submit Material</a></li>
</ul>
</div>
</div>
</div>
</div>
        </div>
        
    </div>
<script>
    $(document).ready(function(){
  $('#fetch_log').on('click',function(){
    var id=$('#user_id').val();
    if(id!=='')
    {
      $.ajax({
        url:'/user/log_fetch',
        type:'POST',
        // dataType:'JSON',
        data:{
          type:1,
          user_id:id
        },
        cache:false,
        success:function(dataResult){ 
            var time_dump=JSON.parse(dataResult);
            console.log(time_dump);
             for(i=0;i<time_dump[0].length;i++)
             {
                $("#time_machine_dump").append("<tr><th scope=\"row\">"+time_dump[0][i].time_jumpid+"</th>"+"<td class=\"timelog\">"+time_dump[0][i].timelog+"</td>"+"</tr>");
              }          
        }
      });
    }
  });
});
</script>
</body>
</html>