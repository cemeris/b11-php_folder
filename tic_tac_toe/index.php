<!doctype html>
<link rel="stylesheet" href="style.css">

<script src="request.js"></script>

<?php
    include('Storage.php');
    $tic_storage = new Storage('data.json');

?>
<h2 class="message"></h2>
<div class="game_board">
    <?php
    for ($i=0; $i <= 8; $i++) {
        ?>
        <a href="api.php?name=move&coord=<?php echo $i; ?>"><?php echo $tic_storage->getEntry($i); ?></a>
        <?php
    }
    ?>
</div>

<a href="api.php?name=reset" class="btn reset">Reset</a>
<script src="script.js"></script>
