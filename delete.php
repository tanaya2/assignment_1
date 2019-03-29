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

    <style>
        body    { 
                background-image: url("assets/images/ferntwo.jpg");
                font color="whitesmoke"
                }
    </style>

    <h5><solid><font color="whitesmoke">Delete an Entry</font></solid></h5>

<?php if ($success) echo $success; ?>

<?php foreach($result as $row) { ?>

<p>
    <font color="whitesmoke">
        ID:<?php echo escape($row['id']); ?><br>
        
        Plant Type: <?php echo escape($row['planttype']); ?><br> 
        
        Height: <?php echo $row['height']; ?><br> 
        
        Watered: <?php echo $row['watered']; ?><br>
        
        Notes: <?php echo $row['notes']; ?><br>
        
        <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>  
    </font>
</p>

<?php }; 
?>
</div></div><?php include "templates/footer.php"; ?>