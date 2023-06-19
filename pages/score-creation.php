<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>score creation</title>
</head>
<body>

    <form action="../php/score/add-score.php" method="post">
        <input type="number" name="playerId" placeholder="player id">
        <input type="number" step="0.01" name="gameScore" placeholder="game score">
        <input type="number" name="gameKills" placeholder="game kills">
        <input type="time" step="1" name="gameTime" placeholder="game time">
        <input type="submit" value="create">
    </form>
</body>
