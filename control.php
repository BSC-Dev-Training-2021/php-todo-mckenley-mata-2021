	<?php 



	include 'connect.php' ;
		if (isset($_REQUEST['submit1'])) {
			if (isset($_POST['list'])) {
			$list = stripslashes($_REQUEST['list']);
			$list = mysqli_real_escape_string($conn,$list);
			$turn_date = date("Y-m-d H:i:s");

					//view if the username is already exist
				$select = mysqli_query($conn, "SELECT * FROM tbl_task WHERE task_name = '$list' and status = 'todo' ");
				if(mysqli_num_rows($select)) {
		    		echo "<script type='text/javascript'>alert('Task is ongoing!');</script>";
				}
				else
				{
					//insert the data to database
		        	$query = "INSERT into `tbl_task` (task_name, status, turn_date) VALUES ('$list', 'todo', '$turn_date')";
		        	$result = mysqli_query($conn,$query);

		        	if($result){
		    		echo "<script type='text/javascript'>alert('Task added to list!');</script>";

		           	mysqli_close($conn);
		        	}
				}	

			}

		}
	function viewData(){
		include 'connect.php' ;
		$query = "SELECT * FROM tbl_task where status='todo'";
        if ($result = $conn->query($query)) {
        	while ($row = $result->fetch_assoc()) {
        		echo "<li class=\"list-group-item\">";
                echo $row['task_name'];
                echo "<a href='index.php?edit=".$row['id']."'><button type=\"submit\" class=\"btn btn-light fa fa-check float-right\" ></button></a>";
                echo "<a href='index.php?delete=".$row['id']."'><button type=\"submit\" class=\"btn btn-light fa fa-trash-o float-right\" ></button></a>";
        	}
        }
	}


	function delete(){
		include 'connect.php' ;
		if (isset($_GET['delete'])) {
			$sql = "DELETE FROM tbl_task WHERE id=".$_GET['delete']."";

			if ($conn->query($sql) === TRUE) {
			 	echo "<script type='text/javascript'>alert('Succesfully deleted!');</script>";
			 	header('Location: index.php');
			}	
		}
		
$conn->close();

	}
	function edit(){
		include 'connect.php' ;

		if (isset($_GET['edit'])) {
			$sql1 = "UPDATE tbl_task set status='done' where id=".$_GET['edit']."";
			if(mysqli_query($conn,$sql1)){  
				echo "<script type='text/javascript'>alert('Completed!');</script>";
				header('Location: index.php');			 	
			}
		} 
	}

		function done(){/// view all the list todo on index
		include 'connect.php';

            $query1 = "SELECT * FROM tbl_task where status = 'done'";
            if ($result = $conn->query($query1)) {

	            /* fetch associative array */
	            while ($row = $result->fetch_assoc()) {
	            	echo "<li class=\"list-group-item\">";
                    echo $row['task_name'];	
                    echo "</li>";	
                    
	    		}
	    		
			}
		}

