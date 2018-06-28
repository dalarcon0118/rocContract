<?php

namespace App\Models\Base;;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $contract_id
 * @property int $hotel_room_id
 * @property int $plan_id
 * @property string $start_date
 * @property string $end_date
 * @property int $allotment
 * @property int $release_days
 * @property float $price
 * @property Contract $contract
 * @property Hotelroom $hotelroom
 * @property Nomenclador $nomenclador
 * @property Discount[] $discounts
 * @property Supplement[] $supplements
 */
class Price extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'price';

    /**
     * @var array
     */
    protected $fillable = ['contract_id', 'hotel_room_id', 'plan_id', 'start_date', 'end_date', 'allotment', 'release_days', 'price'];

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
    public function hotelroom()
    {
        return $this->belongsTo('App\Models\base\Hotelroom', 'hotel_room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discounts()
    {
        return $this->hasMany('App\Models\base\Discount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplements()
    {
        return $this->hasMany('App\Models\base\Supplement');
    }
}
