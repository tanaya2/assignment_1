<?php 
    require "../config.php";
    require "common.php";

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            $work =[
              "id"         => $_POST['id'],
              "planttype" => $_POST['planttype'],
              "height"  => $_POST['height'],
              "watered"   => $_POST['watered'],
              "notes"   => $_POST['notes'],
              "date"   => $_POST['date'],
            ];
            
            $sql = "UPDATE `plants` 
                    SET id = :id, 
                        planttype = :planttype, 
                        height = :height, 
                        watered = :watered, 
                        notes = :notes, 
                        date = :date 
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
            
            $sql = "SELECT * FROM plants WHERE id = :id";

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

<?php include "templates/header.php"; ?><div class="container"><div class="row">

    <style>
        body { 
                background-image: url("assets/images/ferntwo.jpg");
                font color: whitesmoke;
        }
    </style>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <p><font color="whitesmoke">Entry successfully updated.</font></p>
<?php endif; ?>

    <h5><font color="whitesmoke">Edit an Entry</font></h5>

<form method="post">
    
    <label for="id"><font color="whitesmoke">ID</font></label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
    
    <label for="planttype"><font color="whitesmoke">Plant Type</font></label>
    <input type="text" name="planttype" id="planttype" value="<?php echo escape($work['planttype']); ?>">

    <label for="height"><font color="whitesmoke">Height</font></label>
    <input type="text" name="height" id="height" value="<?php echo escape($work['height']); ?>">

    <label for="watered"><font color="whitesmoke">Watered</font></label>
    <input type="text" name="watered" id="watered" value="<?php echo escape($work['watered']); ?>">

    <label for="notes"><font color="whitesmoke">Notes</font></label>
    <input type="text" name="notes" id="notes" value="<?php echo escape($work['notes']); ?>">

    <input type="submit" name="submit" value="Save">

</form>

<?php include "templates/footer.php"; ?>