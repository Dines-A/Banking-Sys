<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stringmethod</title>
</head>
<body>
    <?php
    $phrase1='im dinesh';
    $phrase2='im abo';
    // dot 
    echo $phrase1 . $phrase2;
    echo "<br>";
    // add space for bit Gap
    echo $phrase1 ." ". $phrase2;
    $name='dinesh aboo';
    // diensh -> Dinesh aboo
    echo '<h2> My name is : '. ucfirst($name) .'</h2>';
    // Dinesh Aboo
    echo '<h2> My name is : '. ucwords($name) .'</h2>';
    // DINESH ABOO
    echo '<h2> My name is : '. strtoupper($name) .'</h2>';
    // dinesh aboo
    echo '<h2> My name is : '. strtolower($name) .'</h2>';
    //  dineshdineshdineshdineshdineshdineshdineshdineshdineshdineshdinesh
    echo '<h2> string repet : '. str_repeat("dinesh\n",10) .'</h2>';

    ?>
</body>
</html>