<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/mood/create" method="post">
    <?= csrf_field() ?>

    <!-- Vul een datum in -->
    <label for="datum">Datum</label>
    <input type="date" name="datum" value="<?= set_value('datum') ?>">
    <br>

    <!-- Vul een mood in -->
    <label for="mood">Mood</label>
    <select name="mood">
        <option <?= set_value('mood') ?>>0</option>
        <option <?= set_value('mood') ?>>1</option>
        <option <?= set_value('mood') ?>>2</option>
        <option <?= set_value('mood') ?>>3</option>
        <option <?= set_value('mood') ?>>4</option>
        <option <?= set_value('mood') ?>>5</option>
        <option <?= set_value('mood') ?>>6</option>
        <option <?= set_value('mood') ?>>7</option>
        <option <?= set_value('mood') ?>>8</option>
        <option <?= set_value('mood') ?>>9</option>
        <option <?= set_value('mood') ?>>10</option>
    </select>
    <br>

    <!-- Vul een plek in -->
    <select name="plekken" id="mood">
        <option <?= set_value('plekken') ?>>school</option>
        <option <?= set_value('plekken') ?>>werk</option>
        <option <?= set_value('plekken') ?>>thuis</option>
    </select>

    <br>

    <!-- submit je mood -->
    <input type="submit" name="submit" value="Create mood item">
</form>