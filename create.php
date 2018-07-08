<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $classError = null;
        $addressError = null;
        $guardianError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $class = $_POST['class'];
        $address = $_POST['address'];
        $gname = $_POST['gname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($class)) {
            $nameError = 'Please enter you Class';
            $valid = false;
        }

        if (empty($address)) {
            $nameError = 'Please enter you address';
            $valid = false;
        }

        if (empty($gname)) {
            $nameError = 'Please enter you Guardian Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO students (name,class,addr,guardian,email,mobile) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$class,$address,$gname,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="span10 offset1">
                    <div class="row">
                        <h3>Add Student Info</h3>
                    </div>
             
                <form class="form-horizontal" action="create.php" method="post">
                     <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

					<div class="control-group <?php echo !empty($classError)?'error':'';?>">
                        <label class="control-label">Class</label>
                        <div class="controls">
                            <input name="class" type="text"  placeholder="Class" value="<?php echo !empty($class)?$class:'';?>">
                            <?php if (!empty($classError)): ?>
                                <span class="help-inline"><?php echo $classError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                     <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="address" type="text"  placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($guardianError)?'error':'';?>">
                        <label class="control-label">Guardian Name</label>
                        <div class="controls">
                            <input name="gname" type="text"  placeholder="Guardian Name" value="<?php echo !empty($gname)?$gname:'';?>">
                            <?php if (!empty($guardianError)): ?>
                                <span class="help-inline"><?php echo $guardianError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Save</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                </form>
        </div>
</div>
</body>
</html>
