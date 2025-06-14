<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question', 'answer'];

    public function getAllFaq()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }
}
