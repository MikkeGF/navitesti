
		<h1>Tuoteryhmät</h1>

		<table>

		<?php foreach($tuotteet as $tuote): ?>
			<tr>
				<td><?= $tuote->id ?></td><td><?= $tuote->nimi ?><td>
				<td><?= anchor('tuoteryhma/update/' . $tuote->id . "/" . $tuote->nimi, "MUOKKAA"); ?></td>
				<td><?= anchor('tuoteryhma/delete/' . $tuote->id, "POISTA"); ?></td>		
			</tr>
		<?php endforeach ?>

		</table>
		

		<p>Lisää uusi tuoteryhmä</p>

		<form action="tuoteryhma/lisaa">
			<input type="text" name="tuoteryhma" />
			<input type="submit" value="Lisää" />
		</form>

