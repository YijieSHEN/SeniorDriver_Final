<div style="padding-top:100px; padding-left: 5%; padding-right: 5%">

 
<script src="<?php echo asset_url(); ?>js/cdnjs.js"></script>


<div class="container marketing">
      <div class="row">
        <div class="span4">
               <h4 class="text-center" style="background-color: #DCDCDC; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">Postcode: <?php echo $postcode; ?></h4>
        </div>
        <div class="span4">
               <h4 class="text-center" style="background-color: #DCDCDC; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">Total Crashes: <span class="totalresult"><?php echo $result_row; ?></span></h4>
        </div>
        <div class="span4">
               <h4 class="text-center" style="background-color: #DCDCDC; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;"> Year: <?php echo $period; ?></h4>
        </div>
      </div>
   </div>
<br/>

<div class="container marketing">
      <div class="row">
        <div class="span6">
               <p class="text-center" style="background-color: #DCDCDC; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;"><a class="btn btn-info" href="<?php echo base_url($details_link); ?>" style="border-radius: 25px;">View Details &raquo;</a></p>
        </div>
        <div class="span6">
               <p class="text-center" style="background-color: #DCDCDC; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;"><a class="btn btn-danger" href="<?php echo base_url($map_link); ?> "style="border-radius: 25px;">Danger Spots &raquo;</a></p>
        </div>
      </div>
   </div>
<br/>

<div class="container marketing" >
      <div class="row">
        <div class="span6" style="background-color: #F5F5F5; padding-top: 10px; padding-bottom: 10px; border-radius: 20px;">
          <div class="numberCircle count" id="query_one_div"><span class="count_one"><?php echo $query_one; ?></span></div>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <h2 class="text-center"><?php echo $postcode; ?> vs Victoria</h2>
          <p class="text-center">More(+) / Less(-) than the average Victoria suburb</p>
          </div>
        </div>
        <div class="span6" style="background-color: #F5F5F5; padding-top: 10px; padding-bottom: 10px; border-radius: 20px;">
          <div class="numberCircle text-center" id="query_two_div"><span class="count_two"><?php echo $query_two; ?></span></div>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <h2 class="text-center">Last year vs This year</h2>
          <p class="text-center">Compares the crash data for last year with the current year.</p>
          </div>
        </div>
      </div>
</div>
<br/>

<script type="text/javascript">
    //var query_one_div = document.getElementById('query_one_div');
    query_one_div.style.backgroundColor = 'green';



</script>

<?php
     echo "<script type='text/javascript'>\n";
     echo "var query_four_label = []" . "\n";
     echo "var query_four_value = []" . "\n";
     foreach ($query_four as $value){
        echo "query_four_label.push(". json_encode($value->Speed_Zone). ")\n"; // access attributes
        echo "query_four_value.push(". json_encode($value->num_accidents). ")\n"; // access attributes
     }
     echo "</script>\n";
?>

<?php
     echo "<script type='text/javascript'>\n";
     echo "var query_five_label = []" . "\n";
     echo "var query_five_value = []" . "\n";
     foreach ($query_five as $value){
        echo "query_five_label.push(". json_encode($value->Day_Week_Desc). ")\n"; // access attributes
        echo "query_five_value.push(". json_encode($value->num_accidents). ")\n"; // access attributes
     }
     echo "</script>\n";
?>

<?php
     echo "<script type='text/javascript'>\n";
     echo "var query_six_label = []" . "\n";
     echo "var query_six_value = []" . "\n";
     foreach ($query_six as $value){
        echo "query_six_label.push(". json_encode($value->Road_Geometry). ")\n"; // access attributes
        echo "query_six_value.push(". json_encode($value->num_accidents). ")\n"; // access attributes
     }
     echo "</script>\n";
?>

<?php
     echo "<script type='text/javascript'>\n";
     echo "var query_three_label = []" . "\n";
     echo "var query_three_value = []" . "\n";
     foreach ($query_three as $value){
        echo "query_three_label.push(". json_encode($value->period). ")\n"; // access attributes
        echo "query_three_value.push(". json_encode($value->num_accidents). ")\n"; // access attributes
     }
     echo "</script>\n";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<div class="container marketing">
      <div class="row">
        <div class="span6" style="background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <canvas id="query_three"></canvas>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
            <h2 class="text-center">Hourly Break Down</h2>
            <p class="text-center">Number of crashes happened in 24hrs</p>
          </div>
        </div>
        <div class="span6" style="background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <canvas id="query_five"></canvas>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <h2 class="text-center">Day of Week</h2>
          <p class="text-center">Proportion of crashes happened in each day of week</p>
          </div>
        </div>
        
      </div>
   </div>

<br/>

<div class="container marketing">
      <div class="row">
        <div class="span6" style="background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <canvas id="query_four"></canvas>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <h2 class="text-center">Speed Zone</h2>
          <p class="text-center">Number of crashes happened in different speed zones.</p>
          </div>
        </div>
        <div class="span6" style="background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <canvas id="query_six"></canvas>
          <div style="background-color: #DCDCDC; margin-left: 10%; margin-right: 10%; margin-top: 5%; margin-bottom: 2%; padding-top: 15px; padding-bottom: 15px; border-radius: 20px;">
          <h2 class="text-center">Road Geometry</h2>
          <p class="text-center">Proportion of crashes happened in different types of intersections.</p>
          </div>
        </div>
      </div>
   </div>
<br/>

<script type="text/javascript">
     //alert(php_variables.sheetID);
     var ctx = document.getElementById('query_four').getContext('2d');
     var myChart = new Chart(ctx, {
          type: 'line',
          data: {
               labels: query_four_label,
               datasets: [{
                    label: 'Number of Accidents: ',
                    data: query_four_value,
                                              backgroundColor: "rgba(46, 204, 112, 0.65)"

               }]
          },
          options: {
            legend: {
              display: false
            },
            
          }
     });
</script>

<script type="text/javascript">
     //alert(php_variables.sheetID);
     //Chart.defaults.global.legend.display = false;

     var ctx = document.getElementById('query_five').getContext('2d');
     var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
               labels: query_five_label,
               datasets: [{
                    label: 'Day Week Desc: ',
                    data: query_five_value,
                    backgroundColor: [
                         "rgba(46, 204, 112, 0.7)",
                         "rgba(52, 152, 219, 0.7)",
                         "rgba(149, 165, 166, 0.7)",
                         "rgba(155, 89, 182, 0.7)",
                         "rgba(241, 196, 15, 0.7)",
                         "rgba(231, 76, 60, 0.7)",
                         "rgba(52, 73, 94, 0.7)"
                    ]
               }]
          },
          options: {
            legend: {
              display: false
            },
            
          }
     });
</script>

<script type="text/javascript">
     //alert(php_variables.sheetID);
     var ctx = document.getElementById('query_six').getContext('2d');
     var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
               labels: query_six_label,
               datasets: [{
                    label: 'Number of Accidents: ',
                    data: query_six_value,
                    backgroundColor: [
                         "rgba(46, 204, 112, 0.8)",
                         "rgba(52, 152, 219, 0.8)",
                         "rgba(149, 165, 166, 0.8)",
                         "rgba(155, 89, 182, 0.8)",
                         "rgba(241, 196, 15, 0.8)",
                         "rgba(231, 76, 60, 0.8)",
                         "rgba(52, 73, 94, 0.8)"
                    ]
               }]
          }
     });
</script>

<script type="text/javascript">
     //alert(php_variables.sheetID);
     var ctx = document.getElementById('query_three').getContext('2d');
     var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
               labels: query_three_label,
               datasets: [{
                    label: 'Number of Accidents: ',
                    data: query_three_value,
                    backgroundColor: [
                         "rgba(46, 204, 112, 0.8)",
                         "rgba(52, 152, 219, 0.8)",
                         "rgba(149, 165, 166, 0.8)",
                         "rgba(155, 89, 182, 0.8)",
                         "rgba(241, 196, 15, 0.8)",
                         "rgba(231, 76, 60, 0.8)",
                         "rgba(52, 73, 94, 0.8)"
                    ]
               }]
          }
     });
</script>

<script type="text/javascript">
$('.count_one').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {

          console.log($(this).text().replace(/[^\d.-]/g, ''));
          if($(this).text().replace(/[^\d.-]/g, '') > 0){
                $(this).text('+'+Math.ceil(now)+'%');
                var query_one_div = document.getElementById('query_one_div');
                query_one_div.style.backgroundColor = 'rgba(231, 76, 60, 0.8)';
          }
          else{
                $(this).text(Math.ceil(now)+'%');
                var query_one_div = document.getElementById('query_one_div');
                query_one_div.style.backgroundColor = 'rgba(46, 204, 112, 0.8)';
          }
        }
    });
});
$('.count_two').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {

          console.log($(this).text().replace(/[^\d.-]/g, ''));
          if($(this).text().replace(/[^\d.-]/g, '') > 0){
                $(this).text('+'+Math.ceil(now)+'%');
                var query_one_div = document.getElementById('query_two_div');
                query_one_div.style.backgroundColor = 'rgba(231, 76, 60, 0.8)';
          }
          else{
                $(this).text(Math.ceil(now)+'%');
                var query_one_div = document.getElementById('query_two_div');
                query_one_div.style.backgroundColor = 'rgba(46, 204, 112, 0.8)';
          }
        }
    });
});
</script>

<script type="text/javascript">
$('.totalresult').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>

<!--<table border="1" class="table table-responsive">
          <tr>
               <td>
                    ACCIDENT_NO
               </td>
               <td>
                    lga_name
               </td>
               <td>
                    Age
               </td>
               <td>
                    Sex
               </td>
               <td>
                    Accident_Date
               </td>
               <td>
                    Day_Week_Desc
               </td>
          </tr>
          <?php foreach ($accident_list as $key) {?>
               <tr>
               <td>
                    <?php echo $key->ACCIDENT_NO; ?>
               </td>
               <td>
                    <?php echo $key->lga_name; ?>
               </td>
               <td>
                    <?php echo $key->Age; ?>
               </td>
               <td>
                    <?php echo $key->Sex; ?>
               </td>
               <td>
                    <?php echo $key->Accident_Date; ?>
               </td>
               <td>
                    <?php echo $key->Day_Week_Desc; ?>
               </td>
               </tr>
          <?php }?>
     </table>-->



</div>

