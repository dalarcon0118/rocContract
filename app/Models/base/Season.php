<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 */
class Season extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'season';

    /**
     * @var array
     */
    protected $fillable = ['start_date', 'end_date', 'description'];

}
