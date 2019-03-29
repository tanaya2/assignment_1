<?php 
	
    require "../config.php"; 
 
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM plants";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
?>

<?php include "templates/header.php"; ?><div class="container"><div class="row">

    <style>
        body { 
                background-image: url("assets/images/ferntwo.jpg");
        }
    </style>
    
    <h5><solid><font color="whitesmoke">Update an Entry</font></solid></h5>

<?php foreach($result as $row) { ?>

<p><font color="whitesmoke">
    
    ID: <?php echo $row['id']; ?><br> 
    
    Plant Type: <?php echo $row['planttype']; ?><br> 
    
    Height: <?php echo $row['height']; ?><br>
    
    Watered: <?php echo $row['watered']; ?><br>
    
    Notes: <?php echo $row['notes']; ?><br>
    
    </font></p>
    
    <a href='update-work.php'.php?id=<?php echo $row['id']; ?>'>Edit</a>

<hr>
<?php };
?>

</div></div><?php include "templates/footer.php"; ?>