<?php

namespace App\Repositories;



abstract class Repository
{
    protected $model = FALSE;

    public function get($select = '*', $take = FALSE)
    {
        $builder = $this->model->select($select);

        if($take)
        {
            $builder->take($take);
        }

        return $builder->get();
    }

}