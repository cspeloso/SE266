<?php
//array creation

//initializes array
$colorsArray = array();

/*for loop, generates random colors and puts them into an array
for later use by the program.*/
for($i = 1;$i <= 500; $i++)
{

    $color = "#";

    /*
    generates a HEX color code. adds the number generated
    to the color variable, but checks to see if it's between
    10 and 15 first. if it is, it changes it to the corresponding
    letter, and then adds that to the color variable instead.
    */
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

    //puts the color generated into the colors array.
    array_push($colorsArray,"$color");
}//for loop end


//table creation

//randomly generates what size the array will be
$size = mt_rand(5,15);

//begins writing HTML
$table = "<table>\n<tbody>\n";

//generates the table with the random colors generated above
for($rows = 1;$rows <= $size; $rows++)
{
    $table .= "<tr>\n";
    for($cols = 1;$cols <= $size;$cols++)
    {
        $colorThing = $rows * $cols;

        $table .= "<td style='background-color:" . $colorsArray[$colorThing] . ";'>$colorsArray[$colorThing]<br><span style='color:#ffffff;'>$colorsArray[$colorThing]</span></td>\n";
    }
    $table .= "</tr>\n";
}

//ends the HTML table
$table .= "</tbody>\n</table>\n";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Colors</title>
</head>
<body>
<h1 id="test">PHP Colors Table</h1>

<!-- PHP command outputting $table -->
<?PHP print_r($table); ?>
</body>
</html>