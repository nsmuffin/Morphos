<html>
<form method="post">
Введите слово: <input name="word" value="<?= isset($_POST['word']) ? $_POST['word'] : null ?>"> <label><input type="checkbox" name="animate" <?= isset($_POST['animate']) ? "checked='checked'" : null ?> /> одушевл. </label><input type="submit"/>
</form>
<?php
require dirname(dirname(__FILE__)).'/vendor/autoload.php';
$dec = new morphos\RussianGeneralDeclension();
$plu = new morphos\RussianPlurality();
if (isset($_POST['word'])) {
	if (!isset($_POST['animate'])) $_POST['animate'] = false;
	else $_POST['animate'] = true;

	echo '<pre>';
		var_dump($dec->getDeclension($_POST['word']));
	echo '</pre>';
	echo '<pre>';
		var_dump($dec->getForms($_POST['word'], $_POST['animate']));
	echo '</pre>';
	echo '<pre>';
		var_dump($dec->pluralizeAllDeclensions($_POST['word'], $_POST['animate']));
	echo '</pre>';

	echo "<blockquote>";
	for ($i = 0; $i <= 20; $i++) {
		echo $i.' '.$plu->pluralize($_POST['word'], $i, $_POST['animate'])."<br/>";
	}
	echo "</blockquote>";
}
?>
</html>