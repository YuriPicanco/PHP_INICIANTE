<?php

require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/variables.php';
require_once __DIR__ . '/getPlayers.php';
require_once __DIR__ . '/buildBoard.php';
require_once __DIR__ . '/isPositionCorrect.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/constants.php';


do {
    $players= getPlayers();

    $player = PLAYER_ONE_ICON;

    $board = buildBoard();

    $winner = null;

    while ($winner === null) {
        echo showBoard($board);


        $position = (int) readline("Player {$player}, digite a sua posição: ");

        if(!isPositionCorrect($position, $board)){
            continue;
        }

        

        $board[$position] = $player;

        if (
            ($board[0] === 'X' && $board[1] === 'X' && $board[2] === 'X') ||
            ($board[3] === 'X' && $board[4] === 'X' && $board[5] === 'X') ||
            ($board[6] === 'X' && $board[7] === 'X' && $board[8] === 'X') ||
            ($board[0] === 'X' && $board[3] === 'X' && $board[6] === 'X') ||
            ($board[1] === 'X' && $board[4] === 'X' && $board[7] === 'X') ||
            ($board[2] === 'X' && $board[5] === 'X' && $board[8] === 'X') ||
            ($board[0] === 'X' && $board[4] === 'X' && $board[8] === 'X') ||
            ($board[2] === 'X' && $board[4] === 'X' && $board[6] === 'X')
        ) {
            $winner = 'X';
        }

        if (
            ($board[0] === 'O' && $board[1] === 'O' && $board[2] === 'O') ||
            ($board[3] === 'O' && $board[4] === 'O' && $board[5] === 'O') ||
            ($board[6] === 'O' && $board[7] === 'O' && $board[8] === 'O') ||
            ($board[0] === 'O' && $board[3] === 'O' && $board[6] === 'O') ||
            ($board[1] === 'O' && $board[4] === 'O' && $board[7] === 'O') ||
            ($board[2] === 'O' && $board[5] === 'O' && $board[8] === 'O') ||
            ($board[0] === 'O' && $board[4] === 'O' && $board[8] === 'O') ||
            ($board[2] === 'O' && $board[4] === 'O' && $board[6] === 'O')
        ) {
            $winner = 'O';
        }

        if (!in_array('.', $board)) {
            break;
        }

        if ($player === 'X') {
            $player = 'O';
        } else {
            $player = 'X';
        }
    }

    echo <<<EOL
         Posições: | Tabuleiro
                   |
           0|1|2   |   $board[0]|$board[1]|$board[2]
           3|4|5   |   $board[3]|$board[4]|$board[5]
           6|7|8   |   $board[6]|$board[7]|$board[8]
        EOL
    ;

    if ($winner === 'X') {
        echo "VENCEDOR: {$playerOne}.\n";
    } elseif ($winner === 'O') {
        echo "VENCEDOR: {$playerTwo}.\n";
    } else {
        echo "EMPATE.\n";
    }

    $playAgain = filter_var(
        readline("\nDeseja jogar novamente? (true/false): "),
        FILTER_VALIDATE_BOOLEAN
    );

    echo "\n";
} while ($playAgain === true);

?>