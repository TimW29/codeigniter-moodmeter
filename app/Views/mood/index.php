<style>
    body {
        font-family: Arial;
    }

    .gridContainer {
        display: inline-grid;
    }

    .moodItem {
        border: solid;
        margin: 20px;
        width: 200px;
    }

    .debug-view-path {
        visibility: hidden;
    }
</style>
<body>

<h2><?= esc($title) ?></h2>

<?php if (! empty($mood) && is_array($mood)): ?>

    <?php 
        for ($id = 0; $id < count($mood); $id++):
        // foreach ($mood as $mood_item): ?>

        <div class="gridContainer">
        <div class="moodItem">
        <h3><?= esc($mood[$id]->datum) ?></h3>

        <div class="main">
                <h3 style="background-color:
                <?php echo $mood[$id]->mood == NULL ? 'blue' : ''; ?>
                <?php echo $mood[$id]->mood == 1 ? 'red' : ''; ?>
                <?php echo $mood[$id]->mood == 2 ? 'red' : ''; ?>
                <?php echo $mood[$id]->mood == 3 ? 'yellow' : ''; ?>
                <?php echo $mood[$id]->mood == 4 ? 'yellow' : ''; ?>
                <?php echo $mood[$id]->mood == 5 ? 'orange' : ''; ?>
                <?php echo $mood[$id]->mood == 6 ? 'orange' : ''; ?>
                <?php echo $mood[$id]->mood == 7 ? 'green' : ''; ?>
                <?php echo $mood[$id]->mood == 8 ? 'green' : ''; ?>
                <?php echo $mood[$id]->mood == 9 ? 'green' : ''; ?>
                <?php echo $mood[$id]->mood == 10 ? 'green' : ''; ?>;">
                <label for="mood"> Je mood:</label>
                <?php 
                if($mood[$id]->mood == NULL)
                {
                    if ($mood[$id - 1]->mood == NULL || $mood[$id + 1]->mood == NULL) {
                    echo 'niet genoeg moods for gemiddeld';
                    } 
                    else {
                    $prev = $mood[$id - 1]->mood;
                    $next = $mood[$id + 1]->mood;
                    echo 'Je gemiddelde is ';
                    echo ($prev + $next) / 2;
                    }
                }
                ?>
                <?= esc($mood[$id]->mood) ?></h3>
        </div>
        <label for="plekken">Waar je deze mood had:</label>
        <h3><?= esc($mood[$id]->plekken) ?>
        </div>
        </div>
</h3>

    <?php endfor ?>

<?php else: ?>

    <h3>No Mood</h3>

    <p>Unable to find any mood for you.</p>

<?php endif ?>

<canvas id="myCanvas" width="300" height="150" style="border:1px solid #d3d3d3;">

Your browser does not support the HTML5 canvas tag.</canvas>

<script>

var c = document.getElementById("myCanvas");

var ctx = c.getContext("2d");

ctx.beginPath();

ctx.fillStyle = "#00ffaa";

ctx.arc(100, 75, 50, 0*Math.PI, 1.2* Math.PI);

ctx.lineTo(100,75);

ctx.fill();

ctx.beginPath();

ctx.fillStyle = "#00aaaa";

ctx.arc(100, 75, 50, 1.2*Math.PI, 1.6* Math.PI);

ctx.lineTo(100,75);

ctx.fill();

ctx.beginPath();

ctx.fillStyle = "#00ffff";

ctx.arc(100, 75, 50, 1.6*Math.PI, 2* Math.PI);

ctx.lineTo(100,75);

ctx.fill();

</script>

<?php 

// $result= mysql_query("SELECT AVG(mood) AS average FROM mood");

// $row = mysql_fetch_assoc($result); 

// $average = $row['average'];

// echo ("This is the average: $average");

?>
</body>