
<div style="padding-top:100px; padding-left: 3%; padding-right: 3%">


<div class="container marketing">
      <div class="row">
        <div class="span4">
               <h4 class="text-center">Postcode: <?php echo $postcode; ?></h4>
        </div>
        <div class="span4">
               <h4 class="text-center">Total Crashes: <span class="totalresult"><?php echo $result_row; ?></span></h4>
        </div>
        <div class="span4">
               <h4 class="text-center">Year: <?php echo $period; ?></h4>
        </div>
      </div>
   </div>
<br/>

<div class="container marketing">

<table border="1" class="table table-striped">
          <thead style="font-weight: bold;">
               <tr>
               <td>
                    Locol Government Area
               </td>
               <td>
                    Longitude
               </td>
               <td>
                    Latitude
               </td>
               <td>
                    Postcode Number
               </td>
               
               <td>
                    Sex
               </td>
               <td>
                    Injury Level Description
               </td>
               <td>
                    Road User Type
               </td>
               <td>
                    Taken Hospital
               </td>
               <td>
                    Accident Date
               </td>
               <td>
                    Day Week Desc
               </td>
               <td>
                    Road Geometry
               </td>
          </tr>
          </thead>
          <?php foreach ($accident_list as $key) {?>
               <tr>
               <td>
                    <?php echo $key->lga_name; ?>
               </td>
               <td>
                    <?php echo $key->Longitude; ?>
               </td>
               <td>
                    <?php echo $key->Latitude; ?>
               </td>
               <td>
                    <?php echo $key->Postcode_No; ?>
               </td>
               
               <td>
                    <?php echo $key->Sex; ?>
               </td>
               <td>
                    <?php echo $key->Inj_Level_Desc; ?>
               </td>
               <td>
                    <?php echo $key->Road_User_Type; ?>
               </td>
               <td>
                    <?php echo $key->Taken_Hospital; ?>
               </td>
               <td>
                    <?php echo $key->Accident_Date; ?>
               </td>
               <td>
                    <?php echo $key->Day_Week_Desc; ?>
               </td>
               <td>
                    <?php echo $key->Road_Geometry; ?>
               </td>
               </tr>
          <?php }?>
     </table>
</div>
</div>

