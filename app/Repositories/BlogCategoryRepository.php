<?php

namespace App\Repositories;

use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Database\Eloquent\Model;



/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getEdit ($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @param int $id
     *
     * @return Collection|\Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function getForComboBox ()
    {
//        return $this->startConditions()->all();
        $columns = implode(', ',[
            'id',
            'CONCAT (id,". ",title) AS id_title',
        ]);

        $resoult[] = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];
        $resoult = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);
        return $resoult;
    }
}
