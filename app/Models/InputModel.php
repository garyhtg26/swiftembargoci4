<?php

namespace App\Models;

use CodeIgniter\Model;

class InputModel extends Model
{
    protected $table      = 'Input';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'issuebank', 'advisingbank', 'applicant', 'beneficiary'];
}