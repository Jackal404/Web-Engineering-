<?php
    require 'database.php';
    $roll = null;
    if ( !empty($_GET['roll'])) {
        $id = $_REQUEST['roll'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM student where roll = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($roll));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>View Student Info</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>

                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Class</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['class'];?>
                            </label>
                        </div>
                      </div>

                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['addr'];?>
                            </label>
                        </div>
                      </div>

                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Guardian Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['gname'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mobile'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>