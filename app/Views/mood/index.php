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

<div id="piechart" style="width: 900px; height: 500px;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<?php 

// $result= mysql_query("SELECT AVG(mood) AS average FROM mood");

// $row = mysql_fetch_assoc($result); 

// $average = $row['average'];

// echo ("This is the average: $average");

?>
</body>