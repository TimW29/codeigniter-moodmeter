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

    <!-- Dit laat de moods zien -->
    <?php 
        for ($id = 0; $id < count($mood); $id++):
        // foreach ($mood as $mood_item): ?>

        <div class="gridContainer">
        <div class="moodItem">
        <h3><?= esc($mood[$id]->datum) ?></h3>

        <div class="main">
                <h3 style="background-color:
                <?php echo $mood[$id]->mood == NULL ? 'lightblue' : ''; ?>
                <?php echo $mood[$id]->mood == 1 ? 'orangered' : ''; ?>
                <?php echo $mood[$id]->mood == 2 ? 'orangered' : ''; ?>
                <?php echo $mood[$id]->mood == 3 ? 'orangered' : ''; ?>
                <?php echo $mood[$id]->mood == 4 ? 'orange' : ''; ?>
                <?php echo $mood[$id]->mood == 5 ? 'orange' : ''; ?>
                <?php echo $mood[$id]->mood == 6 ? 'orange' : ''; ?>
                <?php echo $mood[$id]->mood == 7 ? 'lightgreen' : ''; ?>
                <?php echo $mood[$id]->mood == 8 ? 'lightgreen' : ''; ?>
                <?php echo $mood[$id]->mood == 9 ? 'lightgreen' : ''; ?>
                <?php echo $mood[$id]->mood == 10 ? 'lightgreen' : ''; ?>;">
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

<br>

<div id="piechart" style="width: 900px; height: 500px;"></div>


<?php 

// $result= mysql_query("SELECT AVG(mood) AS average FROM mood");

// $row = mysql_fetch_assoc($result); 

// $average = $row['average'];

// echo ("This is the average: $average");
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          <?php 
            echo "['school',15],";
            echo "['thuis',20],";
        ?>
        ]);

        var options = {
          title: 'De moods'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>