<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $hotel_id
 * @property int $room_id
 * @property Hotel $hotel
 * @property Nomenclador $nomenclador
 * @property Price[] $prices
 */
class HotelRoom extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hotelroom';

    /**
     * @var array
     */
    protected $fillable = ['hotel_id', 'room_id'];

    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Models\base\Hotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nomenclador()
    {
        return $this->belongsTo('App\Models\base\Nomenclator', 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\Models\base\Price', 'hotel_room_id');
    }
}
