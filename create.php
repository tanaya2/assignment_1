<?php 

if (isset($_POST['submit'])) {
    require "../config.php";  
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
   // SECOND: Get the contents of the form and store it in an array
        $new_plant = array( 
            "planttype" => $_POST['planttype'], 
            "height" => $_POST['height'],
            "watered" => $_POST['watered'],
            "notes" => $_POST['notes'], 
        );
        
        $sql = "INSERT INTO plants (planttype, height, watered, notes) VALUES (:planttype, :height, :watered, :notes)";        
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_plant);
        
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?><div class="container"><div class="row">

    <style>
        body { 
                background-image: url("assets/images/ferntwo.jpg");
        }
    </style>
    
    <h5><solid><font color="whitesmoke">Add an Entry</font></solid></h5>

<!--form to collect data for each entry-->

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
    
    
    <?php if (isset($_POST['submit']) && $statement) { ?>
    <p><font color="white">Entry successfully added.</font></p>
<?php } ?>

</form>
        </div>
</div>

<?php include "templates/footer.php"; ?>