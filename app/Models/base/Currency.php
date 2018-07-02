<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property float $value
 * @property string $description
 * @property string $createdAt
 * @property string $updatedAt
 * @property Contract[] $contracts
 */
class Currency extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'currency';

    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'value', 'description', 'createdAt', 'updatedAt'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public $timestamps = false;

    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
