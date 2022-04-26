<?php
	require_once('db_connect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


	$results = mysqli_query( $connect, "SELECT * FROM projects" )
		or die("Can not execute query");

	echo "<table border> \n";
	echo "<th>Project Name</th> <th>Target Amount</th> <th>Collected Amount</th> <th>Donate</th> \n";

	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $PROJECT_NAME </td>";
		echo "<td> $TARGET_AMOUNT </td>";
		echo "<td> $COLLECTED_AMOUNT </td>";
		echo "<td> <a href = 'backend.php?id=$ID&ca=$COLLECTED_AMOUNT'> Donate </a> </td>";
		// echo "<td> <a href = 'update_input.php?id=$id&f0=$f0&f1=$f1'> Update </a> </td>";
		echo "</tr> \n";
	}

	echo "</table> \n";

	// echo "<p><a href=create_input.php>CREATE a new record</a>";
?>