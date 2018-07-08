<!DOCTYPE html>
<html>
<head>
	<title>Assignment-Ashish</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <center><h1> Genius Technical School </h1></center>
	<div class="row">
			<h2> Records of Students </h2>
	</div>
  <div class="row">
    <p>
      <a href="create.php" class="btn btn-success">New Student</a>
    </p>
		<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                    	<th>Roll No </th>
                     	<th>Name</th>
                     	<th>Class</th>
                     	<th>Address</th>
                     	<th>Guardian Name</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM student ORDER BY roll DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['class']. '</td>';
                            echo '<td>'. $row['address']. '</td>';
                            echo '<td>'. $row['guardian']. '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['mobile'] . '</td>';
                           echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['roll'].'">View</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['roll'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['roll'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
</div>
</body>
</html>