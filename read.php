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

        <style>
        body { 
                background-image: url("assets/images/ferntwo.jpg");
                font color="whitesmoke";
        }
    </style>
    <h5><solid><font color="whitesmoke">Find an Entry</font></solid></h5>
    
    <form method="post">
    <label for="planttype"><font color="whitesmoke">Plant Type</font></label>
    <input type="text" name="planttype" id="date">
    
    <label for="height"><font color="whitesmoke">Height</font></label>
    <input type="text" name="height" id="height">

    <label for="watered"><font color="whitesmoke">Watered</font></label>
    <input type="text" name="watered" id="watered">

    <label for="notes"><font color="whitesmoke">Notes</font></label>
    <input type="text" name="notes" id="notes"> 
        
     <input type="submit" name="submit" value="Submit">
        
<?php  
    if (isset($_POST['submit'])) {
        if ($result && $statement->rowCount() > 0) { ?>
        <h5><font color="whitesmoke">Results</font></h5>

<?php foreach($result as $row) { ?>

<p><font color="whitesmoke">
    ID: <?php echo $row['id']; ?><br> 
    
    Plant Type: <?php echo $row['planttype']; ?><br> 
    
    Height: <?php echo $row['height']; ?><br> 
    
    Watered: <?php echo $row['watered']; ?><br> 
    
    Notes: <?php echo $row['notes']; ?><br> 
    </font></p>
<?php  
        ?>
<hr>
<?php }; 
        }; 
    }; 
?>

<form method="post">
<font color="whitesmoke">
    <input type="submit" name="submit" value="View All">
    </font>
</form>     
        </div>
    </div>
  </div>

</div></div><?php include "templates/footer.php"; ?>