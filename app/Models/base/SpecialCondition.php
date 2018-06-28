<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $condition_category_id
 * @property string $name_es
 * @property string $name_en
 * @property Nomenclador $nomenclador
 * @property Contract[] $contracts
 */
class SpecialCondition extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'specialcondition';

    /**
     * @var array
     */
    protected $fillable = ['condition_category_id', 'name_es', 'name_en'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'condition_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contracts()
    {
        return $this->belongsToMany('App\Models\base\Contract');
    }
}
