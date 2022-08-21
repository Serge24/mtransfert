<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property int $id
 * @property string $ref
 * @property float $amount
 * @property array $currency
 * @property string|null $proof_picture
 * @property string|null $validation_picture
 * @property int $payee_id
 * @property int $payer_id
 * @property int|null $sale_point_id
 * @property int $is_validated
 * @property int|null $validated_by
 * @property array|null $computed_rate
 * @property string|null $cancellation_reason
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property SalePoint|null $sale_point
 * @property User|null $user
 *
 * @package App\Http\Models
 */

class Transaction extends Model
{
	protected $casts = [
		'amount' => 'float',
		'currency' => 'json',
		'payee_id' => 'int',
		'payer_id' => 'int',
		'sale_point_id' => 'int',
		'is_validated' => 'int',
		'validated_by' => 'int',
		'computed_rate' => 'json'
	];

	protected $fillable = [
		'ref',
		'amount',
		'currency',
		'proof_picture',
		'validation_picture',
		'payee_id',
		'destination_number',
		'payer_id',
		'sale_point_id',
		'is_validated',
		'validated_by',
		'computed_rate',
		'cancellation_reason'
	];

	public function salepoint()
	{
		return $this->belongsTo(SalePoint::class);
	}

    public function payee()
    {
        return $this->belongsTo(User::class, 'payee_id');
    }

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }
}
