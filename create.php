<?php 

if (isset($_POST['submit'])) {
    require "../config.php";  
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $new_entry = array( 
            "planttype" => $_POST['planttype'], 
            "height" => $_POST['height'],
            "watered" => $_POST['watered'],
            "notes" => $_POST['notes'], 
        );
        
        $sql = "INSERT INTO entries (
        planttype, 
        height, 
        watered, 
        notes
        ) VALUES (:planttype, :height, :watered, :notes)";        
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_entry);
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?>

<h2>Add an Entry</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Entry successfully added.</p>
<?php } ?>

<!--form to collect data for each entry-->

<form method="post">
    <label for="planttype">Plant Type</label>
    <input type="text" name="planttype" id="date">

    <label for="height">Height</label>
    <input type="text" name="height" id="height">

    <label for="watered">Watered</label>
    <input type="text" name="watered" id="watered">

    <label for="notes">Notes</label>
    <input type="text" name="notes" id="notes">

    <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>