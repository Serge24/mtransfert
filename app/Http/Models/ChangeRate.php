<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChangeRate
 * 
 * @property int $id
 * @property float $start
 * @property float $end
 * @property float $change
 * @property int $for_togo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Http\Models
 */
class ChangeRate extends Model
{
	protected $casts = [
		'start' => 'float',
		'end' => 'float',
		'change' => 'float',
		'for_togo' => 'int'
	];

	protected $fillable = [
		'start',
		'end',
		'change',
		'for_togo'
	];
}
