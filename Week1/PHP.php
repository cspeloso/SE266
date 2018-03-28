<?PHP
	
	$size = mt_rand(5,10);
	
	$table = "<table>\n";
	for($rows = 1;$rows <= $size;$rows++)
	{
		$table .= "\t<tr>";
		for($cols = 1; $cols <= $size; $cols++)
		{
			$table .= "<td>" . $rows*$cols . "</td>";
		}
		$table .= "\t</tr>";
	}
	$table .= "</table>\n";
	
	$colors = array(
		for($i = 1; i < 100; i++)
		{
			$color = "#";
			array colors(
				for($i = 1; i <=6; i++)				
				{
					$colorPlaceholder = $i;
					
					if($colorPlaceholder = 10)
					{
						$colorPlaceholder = "A";
					}
					if($colorPlaceholder = 11)
					{
						$colorPlaceholder = "B";
					}
					if($colorPlaceholder = 12)
					{
						$colorPlaceholder = "C";
					}
					if($colorPlaceholder = 13)
					{
						$colorPlaceholder = "D";
					}
					if($colorPlaceholder = 14)
					{
						$colorPlaceholder = "E";
					}
					if($colorPlaceholder = 15)
					{
						$colorPlaceholder = "F";
					}
					
					$color .= $colorPlaceHolder;
				}
			);
		}
	);
?>

<!DOCTYPE html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Multiplication Table</title>
</head>
<body>
<?php echo $table; ?>
</body>
</html>