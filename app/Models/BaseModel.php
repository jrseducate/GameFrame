<?php

namespace App\Models;
use App\Models\Traits\BaseModelTraits;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 2/17/2018
 * Time: 11:27 AM
 */

class BaseModel extends Model
{
    use BaseModelTraits;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'gamedev';
}