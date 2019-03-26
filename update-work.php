<?php 
    require "../config.php";
    require "common.php";
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            $work =[
            "id"        => $_POST['id'],
            "planttype" => $_POST['planttype'],
            "height"    => $_POST['height'],
            "height"    => $_POST['height'],
            "notes"     => $_POST['notes'],
            ];
            
            $sql = "UPDATE `entries` 
                    SET id = :id, 
                        planttype = :planttype, 
                        height = :height, 
                        watered = :watered, 
                        notes = :notes, 
                    WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->execute($work);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    if (isset($_GET['id'])) { 
        
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM entries WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();
            
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        echo "No id - something went wrong";
    };
?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit an Entry</h2>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
    
    <label for="planttype">Plant Type</label>
    <input type="text" name="planttype" id="planttype" value="<?php echo escape($work['planttype']); ?>">

    <label for="height">HHeight</label>
    <input type="text" name="height" id="height" value="<?php echo escape($work['height']); ?>">

    <label for="watered">Watered</label>
    <input type="text" name="watered" id="watered" value="<?php echo escape($work['watered']); ?>">

    <label for="notes">Notes</label>
    <input type="text" name="notes" id="notes" value="<?php echo escape($work['notes']); ?>">

    <input type="submit" name="submit" value="Save">

</form>





<?php include "templates/footer.php"; ?>