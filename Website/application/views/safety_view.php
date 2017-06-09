<div style="padding-top:100px; padding-left: 10%; padding-right: 10%">


     <br />  

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

 <script type="text/javascript">// <![CDATA[
 	$(document).ready(function(){
          var country_id = $('#select_make').val(); 
          $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>index.php/Safety/buildDropModels/"+country_id,
                    success: function(data) //we're calling the response json array 'cities'
                    {
                         $("#models").html(data);
                    }
               });
 		$('#select_make').change(function(){ //any select change on the dropdown with id country trigger this code
          //$("#cities > option").remove(); //first of all clear select items
 			var country_id = $('#select_make').val(); // here we are taking country id of the selected one.
 			$.ajax({
 				type: "POST",
 				url: "<?php echo base_url();?>index.php/Safety/buildDropModels/"+country_id,
 				success: function(data) //we're calling the response json array 'cities'
 				{
 	 				$("#models").html(data);
 				}
 			});
 		});
 	});
 // ]]>
</script>



</script>
<form name="SafetyForm" action="data_submitted_safety" method="post" class="centerText" style="padding-top: 20px;margin-left: 30%;margin-right: 30%; padding-bottom: 20px; border-radius: 5px; background-color: #F5F5F5;">
<h3 class="centerText">How safe is your car?</h3>
<h5 class="centerText">Enter the car info and check safety rating</h5>
<br/>
<span class="label label-success">Make </span>&nbsp;
<?php echo form_dropdown('make_lists',  $make_lists,'Make','class="form-control" id="select_make"'); ?>  
<br/>
<span class="label label-success">Model </span>
<select name="model_list" id="models">
 <option selected="selected">
Model
</option>
</select>  
 <br/>
 <span class="label label-success">Year </span>&nbsp;&nbsp;
<select name="year_list"><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017" selected="selected">2017</option></select>  
<br/>
<button class="btn btn-primary" type="submit" value="Submit">Check Now</button><br>

</form>
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
<br/>
<br/>
<?php if(isset($make) && isset($model) && isset($year)){
$star_link = '<img src="' .asset_url() . 'img/star.png" style="width:30px;height:30px;" alt="">';
$star_grey_link = '<img src="' .asset_url() . 'img/star_grey.svg" style="width:30px;height:30px;" alt="">';

$output = '<table border="1" class="table table-striped">
          <thead style="font-weight: bold;" >
               <tr>
               <td>
                    Safety Score
               </td>
               <td>
                    Make
               </td>
               <td>
                    Model
               </td>
               <td>
                    Start Year
               </td>
               <td>
                    End Year
               </td>
            </thead>';
foreach ($band_result as $value){
     $output .='<tr><td>';
     for ($x = 0; $x <= $value->Band; $x++) {
          $output .=$star_link;
     } 
     for ($x = 0; $x <= 3-$value->Band; $x++) {
          $output .=$star_grey_link;
     } 
     $output .='</td>';
	$output .="<td>" .$value->Make . "</td>";
	$output .="<td>" .$value->Model . "</td>";
	$output .="<td>" .$value->Start_Year . "</td>";
	$output .="<td>" .$value->End_Year . "</td></tr>";
}
	$output .="</table><br/>";
     if ($get_crash_make_result != 0 and $get_reg_make_result !=0){
          $output .='<p class="text-center" style="font-size: 150%;"><span style="font-weight: bold;">' . $make .'</span> is involved in <span style="font-weight: bold;">' . $get_crash_make_result . '%</span> of all the accidents in Victoria since 2006</p><p class="text-center" style="font-size: 150%;"> and the brand makes up of <span style="font-weight: bold;">' . $get_reg_make_result . '%</span> of all the cars on road.</p></br/>';
     }
     

echo $output;
} ?>



<br/>
<p class="text-center">Disclaimer: The popularity of the car make has been obtained using Queensland vehicle registration data and is taken as an approximation for Victorian popularity.</p>


</div>