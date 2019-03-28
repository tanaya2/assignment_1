<?php 
    require "../config.php";
    require "common.php";
    if (isset($_GET["id"])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET["id"];
            
            $sql = "DELETE FROM plants WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();

            $success = "Entry successfully deleted";
        } catch(PDOException $error) {
            
            echo $sql . "<br>" . $error->getMessage();
        }
    };
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM plants";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?><div class="container"><div class="row">


<h2>Delete an Entry</h2>

<?php if ($success) echo $success; ?>

<!-- This is a loop, which will loop through each result in the array -->
<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo escape($row['id']); ?>
    Date:
    <?php echo escape($row['planttype']); ?><br> Plant Type:
    <?php echo $row['height']; ?><br> Height:
    <?php echo $row['watered']; ?><br> Notes:
    <?php echo $row['notes']; ?>
    <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
</p>

<hr>
<?php }; 
?>



</div></div><?php include "templates/footer.php"; ?>