<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contract_id
 * @property int $supp_type_id
 * @property float $value
 * @property string $value_type
 * @property string $start_date
 * @property string $end_date
 * @property Contract $contract
 * @property Nomenclador $nomenclador
 * @property Mandatorysuppdiscount[] $mandatorysuppdiscounts
 */
class Mandatorysupplement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mandatorysupplement';

    /**
     * @var array
     */
    protected $fillable = ['contract_id', 'supp_type_id', 'value', 'value_type', 'start_date', 'end_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo('App\Models\base\Contract');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'supp_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mandatorysuppdiscounts()
    {
        return $this->hasMany('App\Models\base\Mandatorysuppdiscount', 'mandatory_supplement_id');
    }
}
