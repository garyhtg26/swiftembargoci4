<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    // protected $returnType = 'App\Entities\Student';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['id','issuebank', 'advisingbank'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'issuebank' => 'required|alpha|max_length[50]',
        'advisingbank' => 'required|alpha|max_length[50]',
        'id' => 'required',
    ];

    protected $validationMessages = [
        'issuebank' => [
            'required' => 'This field is required',
            'max_length' => 'This field cannot exceed {param} characters in length.',
            'alpha' => 'This field may only contain alphabetical characters.',
        ],
        'advisingbank' => [
            'required' => 'This field is required',
            'max_length' => 'This field field cannot exceed {param} characters in length.',
            'alpha' => 'This field may only contain alphabetical characters.',
        ],
        'id' => [
            'required' => 'This field is required',
        ],
    ];
    protected $skipValidation = false;

    public function saveRecord($data)
    {
        $this->setValidationRules($this->validationRules);
        $this->setValidationMessages($this->validationMessages);

        if ($this->save($data)) {
            return true;
        }

        return false;
    }

}
