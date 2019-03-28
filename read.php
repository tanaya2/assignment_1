<?php 

if (isset($_POST['submit'])) {
	
    require "../config.php"; 
     
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM plants";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<?php include "templates/header.php"; ?><div class="container"><div class="row">


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="twelve columns" >
        <h4>Find an Entry</h4>
      


<!-- <form method="post">
    <label for="planttype"><h6>Plant Type</h6></label>
    <input type="text" name="date" id="date">

    <label for="height">Height</label>
    <input type="text" name="height" id="height">

    <label for="watered">Watered</label>
    <input type="text" name="todaysactivites" id="watered">

    <label for="notes">Notes</label>
    <input type="text" name="notes" id="notes">

    <input type="submit" name="submit" value="Submit"> -->       
<?php  
    if (isset($_POST['submit'])) {
        if ($result && $statement->rowCount() > 0) { ?>
<h2>Results</h2>

<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo $row['id']; ?><br> ID:
    <?php echo $row['planttype']; ?><br> Plant Tpye:
    <?php echo $row['height']; ?><br> Height:
    <?php echo $row['watered']; ?><br> Watered:
    <?php echo $row['notes']; ?><br> Notes:
</p>
<?php  
        ?>

<hr>
<?php }; 
        }; 
    }; 
?>



<form method="post">

    <input type="submit" name="submit" value="View all">

</form>
        
        
        
        
        
        
        </div>
    </div>
  </div>



</div></div><?php include "templates/footer.php"; ?>