<?php

namespace App\Models\base;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $contract_id
 * @property int $general_conditions_id
 * @property int $id
 * @property Contract $contract
 * @property Generalcondition $generalcondition
 */
class JurydicFrame extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contract_bygeneral_conditions';

    /**
     * @var array
     */
    protected $fillable = ['contract_id', 'general_conditions_id', 'id'];

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
    public function generalcondition()
    {
        return $this->belongsTo('App\Models\base\GeneralConditions', 'general_conditions_id');
    }
}
