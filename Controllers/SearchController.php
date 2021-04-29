<?php
	require_once "../Models/db_config.php";
    $name = $_REQUEST['name'];
    
    $query = "select * from admin where Name like '%{$name}%'";
    $result = get($query);
    
	if($name =="")
    {
        echo "<h4 align ='center'>Enter Some value<h4>";

    }
	
    else
    {
        $response = "<table border=1 style='border-collapse:collapse;' align='center'>
                        <tr>
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Adeddby</th>
							<th>Operations</th>
                            
                        </tr>";

	
		foreach ($result as $row)
		{	$response .="
							<tr>
							<td>{$row["Admin_Id"]}</td>
							<td>{$row["Name"]}</td>
							<td>{$row["Email"]}</td>
							<td>{$row["Phone"]}</td>
							<td>{$row["Address"]}</td>
							<td>{$row["Added by"]}</td>
							<td> 
								<a href='UpdateAdmin.php?id={$row['Admin_Id']}'> Edit</a> |
								<a href='DeleteAdmin.php?id={$row['Admin_Id']}'> Delete </a>
							</td>
							
							
							</tr>";
			
			
		}

        $response .= "</table>";

 

        echo $response;
    }

?>