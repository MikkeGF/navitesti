<?php namespace App\Models;

use CodeIgniter\Model;

class TuoteryhmaAdminModel extends Model
{
	public function haeKaikki() {

		// avataan tietokantayhteys
		$db = db_connect();

		// luodaan query builder
		$builder = $db->table('tuoteryhma');

		// järjestetään id:n mukaan nousevaan järjestykseen
		$builder->orderBy('id', 'ASC');

		// haetaan kaikki tiedot tuoteryhma-taulusta
		$query   = $builder->get();

		// palauttaa queryn kontrollerille
		return $query->getResult();
	}

	public function lisaaTuoteryhma($tuoteryhmanNimi) {
		// avataan tietokantayhteys
		$db = db_connect();

		// luodaan query builder
		$builder = $db->table('tuoteryhma');

		// muokataan oikeaan muotoon
		$data = [
	        'nimi'  => $tuoteryhmanNimi
		];

		// tallennetaan nimi kantaan
		$builder->insert($data);
	}

	public function remove($id) {	

		// avataan tietokantayhteys
		$db = db_connect();

		// luodaan query builder
		$builder = $db->table('tuoteryhma');
		$builder->where('id', $id);
		$builder->delete();
	}

	public function updateTuoteryhma($id, $tuoteryhmanNimi) {
		// avataan tietokantayhteys
		$db = db_connect();

		// luodaan query builder
		$builder = $db->table('tuoteryhma');

		$data = [
	        'nimi' => $tuoteryhmanNimi
		];

		$builder->where('id', $id);
		$builder->update($data);
	}
}
?>