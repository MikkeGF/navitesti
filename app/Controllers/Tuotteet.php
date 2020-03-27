<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TuoteModel;

class Tuotteet extends BaseController {

    public function nayta() {
        $tuote_model = new TuoteModel;
        $data['tuote'] = $tuote_model->haeRyhmat();
        
        print_r($data);

        
    }
}