<!DOCTYPE html>
<html>
<body>

<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>

<h1>Show File-select Fields</h1>

<h3>Application form or duly accompished & sworn/notarized. *Required</h3>


<form action="file1.php"
           method="post"
           enctype="multipart/form-data">

<h3>Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer *Required</h3>
  <label for="myfile">Select a file:</label>
  <input type="file" id="myfile" name="myfile"><br><br>

           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>


</body>
</html>
