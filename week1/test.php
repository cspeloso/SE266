<?php
    //array creation
    $colorsArray = array();

    $i = 0;

    //while($i <= 500)
    for($i = 1;$i <= 500; $i++)
    {

        $color = "#";

        for($e = 1;$e <= 6; $e++)
        {
            $colorHEX = mt_rand(1,15);

            if($colorHEX === 10)
            {
                $colorHEX = "A";
            }
            if($colorHEX === 11)
            {
                $colorHEX = "B";
            }
            if($colorHEX === 12)
            {
                $colorHEX = "C";
            }
            if($colorHEX === 13)
            {
                $colorHEX = "D";
            }
            if($colorHEX === 14)
            {
                $colorHEX = "E";
            }
            if($colorHEX === 15)
            {
                $colorHEX = "F";
            }

            $color .= $colorHEX;

            $colorHEX = "";
        }//for loop end

        array_push($colorsArray,"$color");
    }//for loop end


    //table creation

    $size = mt_rand(5,15);

    $table = "<table>\n";

    for($rows = 1;$rows <= $size; $rows++)
    {
        $table .= "\t<tr>";
        for($cols = 1;$cols <= $size;$cols++)
        {
            $colorThing = $rows * $cols;

            $table .= "<td style='background-color:" . $colorsArray[$colorThing] . ";'>$colorsArray[$colorThing]<br /><span style='color:#ffffff;'>$colorsArray[$colorThing]</span></td>";
        }
        $table .= "\t</tr>";
    }

    $table .= "</table>\n";


    //print_r($colorsArray);


?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Colors</title>
</head>
<body>
<h1>PHP Colors Table</h1>
<?PHP print_r($table); ?>
</body>
</html>