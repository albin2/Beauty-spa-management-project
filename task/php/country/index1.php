<?php
include("dbcon.php");
$result=mysqli_query($con,"SELECT * FROM `country`");
$rowcount=mysqli_num_rows($result);
print_r($result);

?>
<select id="country">
  <option value="">Select Country</option>
      <?php
      if($rowCount > 0){
          while($row = mysqli_fetch_array($result)){
              echo '<option value="'.$row['cid'].'">'.$row['cname'].'</option>';
          }
      }else{
          echo '<option value="">Country not available</option>';
      }
      ?>
</select>
<select id="state">
    <option value="">Select State</option>
</select>

<select id="city">
    <option value="">Select District</option>
</select>
