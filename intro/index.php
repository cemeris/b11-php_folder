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

    $mixed_arr = [
        4,
        [
            'number' => 5,
            'age' => 36,
            54
        ]
    ];

    $mixed_arr[0];
    $mixed_arr[1]['age'];

    var_dump($mixed_arr);

    echo "<hr>";
    foreach ($mixed_arr[1] as $key => $value) {
        echo "<p style='font-style:italic;'>";
        echo "<b>" . $key . "</b> =&gt; ";
        echo $value .  "</p>";
    }

    echo "<hr>";

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

    $count = count($arr2);
    for ($i = 0; $i < $count; $i++) {
        $value = $arr2[$i];
    }
    */

    foreach ($arr2 as $value) {
        echo "<p>a_" . $value . "<p>";
    }

    foreach ($arr2 as $key => $value) {
        # code...
    }

    if (isset($_GET['click1'])) {
        echo "<h1>\"click1\" page</h1>";
    }
    elseif (isset($_GET['click2'])) {
        echo "<h1>\"click2\" page is loaded</h1>";
    }
?>

<script>
    let arr2 = ['a', 'b', 'c', 'd'];

    for (let value of arr2) {

    }
</script>

<a href="?">Main</a> <hr>
<a href="?click1">Click1</a> <hr>
<a href="?click2">Click2</a>


<?php
    $_GET['click1'];


    /**
 in_array($_GET['coord'], [0, 1, 2, 3, 4, 5, 6, 7, 8])

 name(arg1, arg2);

 function name(param1, param2) {
     action;
     return value;
 }
 */
?>
