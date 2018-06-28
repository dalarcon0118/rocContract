<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $supp_type_id
 * @property int $price_id
 * @property float $value
 * @property string $value_type
 * @property Nomenclador $nomenclador
 * @property Price $price
 */
class Supplement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'supplement';

    /**
     * @var array
     */
    protected $fillable = ['supp_type_id', 'price_id', 'value', 'value_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'supp_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function price()
    {
        return $this->belongsTo('App\Models\base\Price');
    }
}
