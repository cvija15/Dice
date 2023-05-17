<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="kockice.png">
    <title>Dice Roll Game</title>
    <style>
        body {
			background:linear-gradient(to right, #3f5efb, #fc466e);
            text-align: center;
            padding: 50px;
            font-family: Arial, sans-serif;
        }
        .player {
            display: inline-block;
            margin: 20px;
        }
        .dice {
            display: inline-block;
            margin: 10px;
        }
        @keyframes roll {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .roll-animation {
            animation: roll 1s linear;
        }
    </style>
</head>
<body>
    <h1>Throw some dices</h1>

    <?php
    function rollDice()
    {
        return rand(1, 6);
    }

    $players = array(
        array(
            'username' => 'Player 1',
            'picture' => 'player1.png',
            'score' => 0
        ),
        array(
            'username' => 'Player 2',
            'picture' => 'player2.png',
            'score' => 0
        ),
        array(
            'username' => 'Player 3',
            'picture' => 'player3.png',
            'score' => 0
        )
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($players as &$player) {
            $roll1 = rollDice();
            $roll2 = rollDice();
            $total = $roll1 + $roll2;

            $player['score'] += $total;

            echo "<h2>{$player['username']} rolled: $roll1 and $roll2</h2>";
            echo "<h2>Total: $total</h2>";

            echo "<div class='dice roll-animation'>";
            echo "<img src='dice_$roll1.png' alt='Dice $roll1'>";
            echo "<img src='dice_$roll2.png' alt='Dice $roll2'>";
            echo "</div><br>";
        }
    }

    foreach ($players as $player) {
        echo "<div class='player'>";
        echo "<h3>{$player['username']}</h3>";
        echo "<img src='{$player['picture']}' alt='{$player['username']}' width='150px'><br>";
        echo "<h4>Score: {$player['score']}</h4>";
        echo "</div>";
    }
    ?>

    <form method="post">
        <button type="submit">Throw the dices</button>
    </form>
</body>
</html>