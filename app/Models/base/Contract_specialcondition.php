<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $contract_id
 * @property int $specialcondition_id
 * @property Specialcondition $specialcondition
 * @property Contract $contract
 */
class Contract_specialcondition extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contract_specialcondition';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialcondition()
    {
        return $this->belongsTo('App\Models\base\Specialcondition');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo('App\Models\base\Contract');
    }
}
