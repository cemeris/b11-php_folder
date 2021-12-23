<!doctype html>
<meta charset="utf-8">

<p><?php echo "Hello world"; ?></p>

<?php
    $number = 4;
    $string = "This is text";
    $arr = [1, 3, 'hello', [4, 5]];
    $assoc_arr = [
        'name' => "Arnis",
        'age' => 36
    ];

    print($arr[3][1]);

    echo "<br>";

    $i = 3;
    if ($i > 2) {
        echo "i is larger than two";
    }

    $arr2 = [];

    for ($i = 1; $i <= 12; $i++) {
        $arr2[$i] = $i;
    }

    echo "<br>";
    print_r($arr2);

    /*
    for (let value of arr) {
        "<p>"+ value + "<p>";
    }
    */

    foreach ($arr2 as $value) {
        echo "<p>a_" . $value . "<p>";
    }

    if (isset($_GET['click1'])) {
        echo "<h1>\"click1\" page</h1>";
    }
    elseif (isset($_GET['click2'])) {
        echo "<h1>\"click2\" page is loaded</h1>";
    }
?>

<a href="?">Main</a> <hr>
<a href="?click1">Click1</a> <hr>
<a href="?click2">Click2</a>


<?php
    $_GET['click1'];
?>
