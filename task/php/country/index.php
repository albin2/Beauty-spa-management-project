<html>
<head>
  <script type="text/javascript" src="jquery.min.js"></script>
     <script type="text/javascript" src="main.js"></script>
   </head>
  <body>
<input type="button" id="country" name="country" onclick="addcountry()" value="Add Country" >
<input type="button" id="state"name="state" onclick="addstate()" value="Add State" >
<input type="button" name="district" name="district" onclick="adddistrict()" value="Add District" ><br><br>
<div class="cou" id="cou" hidden>
  <caption> Add Country</caption><br><br>
    <input type="text" name="ctry" id="ctry" >
    <input type="button" name="submit1" value="Add" onclick="actry()">
</div>


<div class="sta" id="sta" hidden>
  <caption> Add State</caption><br><br>
  <select id="ctry1">
      <option value="">Select Country</option>
  </select><br><br>
    <input type="text" name="stat" id="stat" >
    <input type="button" name="submit2" value="Add" onclick="astat()">
</div>


<div class="dis" id="dis" hidden>
  <caption> Add District</caption><br><br>
  <select id="ctry2" onchange="getstate1(this.value)">
      <option value="" >Select Country</option>
  </select><br><br>
  <select id="stat2">
      <option value="">Select state</option>
  </select><br><br>
    <input type="text" name="dist" id="dist" >
    <input type="button" name="submit3" value="Add" onclick="adist()">
</div>


</body>
</head>
