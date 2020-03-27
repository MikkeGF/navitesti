<!DOCTYPE html>
<html>
	<head>
		<title>Muokkaa nimeä</title>
	</head>
	<body>
		<h1>Anna uusi nimi</h1>
		<form method="POST" action="/tuoteryhma/edit/">
			<input type="text" name="tuoteryhma" value="<?= $nimi ?>" />
			<input type="hidden" name="id" value="<?= $id ?>" />
			<input type="submit" value="Tallenna" />
		</form>
	</body>
</html>