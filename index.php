<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
		<th>delete</th>
	</tr>
	<?php
		$link = mysqli_connect(
            'localhost',  
            'root',      
            'root',   
            'work'); 
            
		if (isset($_GET['del'])) {
			$del = $_GET['del'];
			$query = "DELETE FROM workers WHERE id=$del";
			mysqli_query($link, $query) or die(mysqli_error($link));
		}
	
		$query = "SELECT * FROM workers";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['id'] . '</td>';
			$result .= '<td>' . $elem['name'] . '</td>';
			$result .= '<td>' . $elem['age'] . '</td>';
			$result .= '<td>' . $elem['salary'] . '</td>';
			$result .= '<td>' . $elem['salary'] . '</td>';
			$result .= '<td><a href="?del=' . $elem['id'] . '">удалить</a></td>';
			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
</table>



