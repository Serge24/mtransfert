<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppSetting
 *
 * @property int $id
 * @property string $default_currency
 * @property array $conversions
 * @property array|null $transfer_accounts
 * @property array|null $euro_to_local
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Http\Models
 */
class AppSetting extends Model
{
	protected $table = 'app_settings';

	protected $casts = [
		'conversions' => 'json',
		'transfer_accounts' => 'json',
		'euro_to_local' => 'json'
	];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'default_currency',
		'conversions',
		'transfer_accounts',
		'euro_to_local'
	];
}
