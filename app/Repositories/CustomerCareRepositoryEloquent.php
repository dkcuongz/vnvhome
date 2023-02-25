<?php

namespace App\Repositories;

use App\Entities\Banner;
use App\Entities\CustomerCare;
use App\Validators\PostValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerCareRepositoryEloquent extends BaseRepositoryEloquent implements CustomerCareRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerCare::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
