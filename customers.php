<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Customers</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Email Address</th>
		                  <th>Mobile Number</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
						require "../database/database.php";
						require "customers.class.php";
						
						$cust = new Customers();

						if(isset($_POST["name"])) $cust->name = $_POST["name"];
						if(isset($_POST["email"])) $cust->email = $_POST["email"];
						if(isset($_POST["mobile"])) $cust->mobile = $_POST["mobile"];

						if(isset($_GET["fun"])) $fun = $_GET["fun"];
						else $fun = 0;

						switch ($fun) {
							case 1: // create
    						    $cust->create_record();
     						   break;
    						case 2: // read
    						    $cust->list_record();
    						    break;
    						case 3: // update
    						    $cust->update_record();
    						    break;
    						case 4: // delete
     						   $cust->delete_record();
     						   break;
    						case 11: // insert database record from create_record()
     						   $cust->insert_record();
     						   break;
    						case 33: // update database record from update_record()
     						   $cust->update_record();
    						    break;
    						case 44: // delete database record from delete_record()
      						  $cust->delete_record();
      						  break;
    						case 0: // list
    						default: // list
        						$cust->list_records();
}
					   /*require 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['mobile'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();*/
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>