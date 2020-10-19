<?php

namespace App\Repositories;

use Barryvdh\Reflection\DocBlock\Type\Collection;
use App\Models\BlogCategory as Model;


/**
 * Class BlogCategoryRepository.
 * @package App\Repositories
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
     * @return Collection
     */
    public function getForComboBox ()
    {
        $columns = implode(', ',[
            'id',
            'CONCAT (id,". ",title) AS id_title',
        ]);

        $resoult = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
        return $resoult;
    }
    /**
     * @param int|null $perPage
     *
     *@return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

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
