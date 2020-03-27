<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TuoteryhmaAdminModel;

class Tuoteryhma extends BaseController
{
    public function index()
    {
		$tuoteryhma_model = new TuoteryhmaAdminModel;
		
		$data ['title'] = 'Verkkokauppa';
		$data['tuotteet'] = $tuoteryhma_model->haeKaikki();
		
		
		echo view('templates/header', $data);
		echo view('tuoteryhma_view', $data);
		echo view('templates/footer', $data);
    }

    public function lisaa() {
    	
    	$tuoteryhmanNimi = $this->request->getVar('tuoteryhma');

    	$tuoteryhma_model = new TuoteryhmaAdminModel;

    	$tuoteryhma_model->lisaaTuoteryhma($tuoteryhmanNimi);

    	// ohjataan takaisin index-sivulle
    	return redirect('tuoteryhma');
    }

    public function update($id, $nimi) {

    	$data['id'] = $id;
    	$data['nimi'] = $nimi;

    	echo view('edit_tuoteryhma_view.php', $data);
    }

    public function delete($id) {

    	$tuoteryhma_model = new TuoteryhmaAdminModel;

    	$tuoteryhma_model->remove($id);

    	// ohjataan takaisin index-sivulle
    	return redirect('tuoteryhma');
    }

    public function edit() {
    	$id = $this->request->getVar('id');
    	$tuoteryhmanNimi = $this->request->getVar('tuoteryhma');

    	$tuoteryhma_model = new TuoteryhmaAdminModel;

    	$tuoteryhma_model->updateTuoteryhma($id, $tuoteryhmanNimi);

    	return redirect('tuoteryhma');
    }
}

?>