<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $person_type_id
 * @property int $mandatory_supplement_id
 * @property int $num_person
 * @property float $value
 * @property string $value_type
 * @property Mandatorysupplement $mandatorysupplement
 * @property Nomenclador $nomenclador
 */
class MandatorySuppDiscount extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mandatorysuppdiscount';

    /**
     * @var array
     */
    protected $fillable = ['person_type_id', 'mandatory_supplement_id', 'num_person', 'value', 'value_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mandatorysupplement()
    {
        return $this->belongsTo('App\Models\base\Mandatorysupplement', 'mandatory_supplement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'person_type_id');
    }
}
