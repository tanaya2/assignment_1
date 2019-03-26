<?php 
	
    require "../config.php"; 
 
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM entries";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
?>

<?php include "templates/header.php"; ?>


<h2>Results</h2>

<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo $row['id']; ?><br> ID:
    <?php echo $row['planttype']; ?><br> Plant Type:
    <?php echo $row['height']; ?><br> Height:
    <?php echo $row['watered']; ?><br> Watered:
    <?php echo $row['notes']; ?><br> Notes:
    <a href='update-work.php?id=<?php echo $row['id']; ?>'>Edit</a>
</p>

<hr>
<?php };
?>





<?php include "templates/footer.php"; ?>