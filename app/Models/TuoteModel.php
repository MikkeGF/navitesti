<?php namespace App\Models;

use CodeIgniter\Model;

class TuoteModel extends Model {

    protected $table = 'tuote';
    

    protected $allowedFields = ['nimi','hinta', 'kuvaus', 'varastomaara', 'kuva', 'tuoteryhma.id AS id'];

    public function haeRyhmat() {
        $this->table('tuote');
        $this->select('tuote.nimi, hinta, kuvaus, varastomaara, kuva, tuote.id AS id');
        $this->join('tuoteryhma', 'tuoteryhma.id = tuote.id');
        $query = $this->get();

        return $query->getResult();
    }
}