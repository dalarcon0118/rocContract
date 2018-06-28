<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $person_type_id
 * @property int $price_id
 * @property int $num_person
 * @property float $value
 * @property string $value_type
 * @property Price $price
 * @property Nomenclador $nomenclador
 */
class Discount extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'discount';

    /**
     * @var array
     */
    protected $fillable = ['person_type_id', 'price_id', 'num_person', 'value', 'value_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function price()
    {
        return $this->belongsTo('App\Models\base\Price');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'person_type_id');
    }
}
