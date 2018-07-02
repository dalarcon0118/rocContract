<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property Contract[] $contracts
 */
class Market extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'market';

    /**
     * @var array
     */
    protected $fillable = ['name', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public $timestamps = false;

    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
