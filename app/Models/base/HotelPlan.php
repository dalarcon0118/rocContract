<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $hotel_id
 * @property int $plan_id
 * @property Hotel $hotel
 * @property Nomenclador $nomenclador
 */
class HotelPlan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hotel_plan';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Nomenclador', 'plan_id');
    }
}
