<?php
    require 'database.php';
    $roll = 0;
     
    if ( !empty($_GET['roll'])) {
        $id = $_REQUEST['roll'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['roll'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM student  WHERE roll = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($roll));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Student</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="roll" value="<?php echo $roll;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="index.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>