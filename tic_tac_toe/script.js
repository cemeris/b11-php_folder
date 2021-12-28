const reset_btn = document.querySelector('.reset');
reset_btn.onclick = function (event) {
    event.preventDefault();
    resetGame();
};

const game_board = document.querySelector('.game_board');
let entry_count = 0;

game_board.onclick = function (event) {
    event.preventDefault();
    if (event.target.tagName === 'A') {
        request.get(event.target.getAttribute('href'), function (data) {
            event.target.textContent = data.symbol;
            if (data.hasWinner) {
                const message = 'Winner is "' + data.symbol + '" !';
                document.querySelector('.message').textContent = message;

                setTimeout(function() {
                    resetGame();
                }, 7000);
            }
        });
    }
};

refreshGame();

function refreshGame() {
    setTimeout(function() {
        request.get('api.php?name=refresh&entry_count=' + entry_count, function (data) {
            entry_count = data.count;
            if (data.hasOwnProperty('allMoves')) {
                let i = 0;
                for (let field of game_board.children) {
                    if (data.allMoves.hasOwnProperty(i)) {
                        field.textContent = data.allMoves[i];
                    }
                    else {
                        field.textContent = '';
                    }
                    i++;
                }
            }

            refreshGame();
        });
    }, 500);
}

function resetGame() {
    request.get(reset_btn.getAttribute('href'), function (data) {
        for (let field of game_board.children) {
            field.textContent = '';
            document.querySelector('.message').textContent = '';
        }
    });
}