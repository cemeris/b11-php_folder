<!doctype html>
<link rel="stylesheet" href="style.css">

<?php
    include('Storage.php');
    $tic_storage = new Storage('data.json');

    if (isset($_GET['coord']) && in_array($_GET['coord'], [0, 1, 2, 3, 4, 5, 6, 7, 8])) {
        $coord = $_GET['coord'];
        $symbol = ($tic_storage->countEntries() % 2 == 0) ? 'x' : 'o';

        $tic_storage->addEntry($coord, $symbol);
    }
?>
<h2 class="message"></h2>
<div class="game_board">
    <?php
    for ($i=0; $i <= 8; $i++) {
        ?>
        <a href="?coord=<?php echo $i; ?>"><?php echo $tic_storage->getEntry($i); ?></a>
        <?php
    }
    ?>
</div>

<a href="?reset=true" class="btn reset">Reset</a>

