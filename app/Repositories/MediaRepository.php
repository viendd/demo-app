<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class MediaRepository extends BaseRepository
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
