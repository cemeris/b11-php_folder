<?php

define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
header('Content-type: application/json');

include('Storage.php');
$tic_storage = new Storage('data.json');

$output = [
    'status' => false
];

if (isset($_GET['name']) && is_string($_GET['name'])) {
    if ($_GET['name'] === 'reset') {
        $tic_storage->reset();

        $output['status'] = true;
        $output['message'] = 'game is reset successfully';
    }
    elseif ($_GET['name'] === 'move') {
        $has_winner = false;

        if (isset($_GET['coord']) && in_array($_GET['coord'], [0, 1, 2, 3, 4, 5, 6, 7, 8])) {
            $coord = $_GET['coord'];
            $symbol = ($tic_storage->countEntries() % 2 == 0) ? 'x' : 'o';
    
            $tic_storage->addEntry($coord, $symbol);
    
            define('MIN_MOVES_TO_WIN', 5);
            if ($tic_storage->countEntries() >= MIN_MOVES_TO_WIN) {
                include('Winning.php');
                $referee = new Winning();
        
                $has_winner = $referee->determineWinner($symbol, $tic_storage->getAllEntries());
            }

            $output['status'] = true;
            $output['message'] = 'Move completed';
            $output['hasWinner'] = $has_winner;
            $output['symbol'] = $symbol;
        }
    }
    elseif ($_GET['name'] === 'refresh') {
        if (isset($_GET['entry_count'])) {
            $entry_count = (int) $_GET['entry_count'];
            if ($entry_count != $tic_storage->countEntries()) {
                $output['allMoves'] = $tic_storage->getAllEntries();
            }
        }
        $output['status'] = true;
        $output['count'] = $tic_storage->countEntries();
    }
}

echo json_encode($output, JSON_PRETTY_PRINT);