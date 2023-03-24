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
    <textarea name="mood" cols="4" rows="1"><?= set_value('mood') ?></textarea>
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