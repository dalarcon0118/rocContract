<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $sign
 * @property Contract[] $contracts
 */
class Sign extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sign';

    /**
     * @var array
     */
    protected $fillable = ['name', 'sign'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
