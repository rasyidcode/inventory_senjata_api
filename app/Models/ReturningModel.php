<?php

namespace App\Models;

use App\Core\MyModel;

class ReturningModel extends MyModel
{
    protected $table                = 'returnings';
    protected $returnType           = 'App\Entities\ReturningEntity';
    protected $allowedFields        = ['borrowing_id', 'document_id', 'desc', 'created_at', 'updated_at', 'deleted_at'];

    // Datatables
    protected $columnOrder          = [];
    protected $columnSearch         = [];


    public function __construct()
    {
        parent::__construct();
    }

    public function getDatatables(string $searchQuery, int $start, int $length, array $order) {
        $i = 0;
        
        $this->builder()->select(
            '
            firearms_types.name as firearm_type, 

            firearms_brands.name as firearm_brand,

            firearms.bpsa_number as bpsa_number,
            firearms.id as firearm_id,
            firearms.firearms_number as firearm_number,

            returnings.id as id,
            returnings.desc as desc,
            returnings.created_at as created_at,

            borrowings.borrowing_number as borrowing_number,

            documents.id as doc_id,
            documents.doc_number as doc_number
            '
        );

        $this->builder()->join('documents', 'documents.id = returnings.document_id', 'left');
        $this->builder()->join('borrowings', 'borrowings.id = returnings.borrowing_id', 'left');
        $this->builder()->join('firearms', 'firearms.id = borrowings.firearm_id', 'left');
        $this->builder()->join('firearms_types', 'firearms_types.id = firearms.firearms_type_id', 'left');
        $this->builder()->join('firearms_brands', 'firearms_brands.id = firearms.firearms_brand_id', 'left');

        foreach($this->columnSearch as $column) {
            if ($searchQuery) {
                if ($i === 0) {
                    $this->builder()->groupStart();
                    $this->builder()->like($column, $searchQuery);
                } else {
                    $this->builder()->orLike($column, $searchQuery);
                }

                if (count($this->columnSearch) - 1 === $i)
                    $this->builder()->groupEnd();
            }
            $i++;
        }

        if ($order)
            $this->builder()->orderBy($this->columnOrder[$order['0']['column']], $order['0']['dir']);

        if ($length !== -1)
            $this->builder()->limit($length, $start);

        $this->builder()->where('returnings.deleted_at', null);

        $result = $this->builder()->get();
        return $result->getResult();
    }

}
