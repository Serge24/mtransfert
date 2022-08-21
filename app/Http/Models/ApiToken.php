<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiToken
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $type
 * @property string $token
 * @property Carbon|null $expires_at
 * @property Carbon $created_at
 *
 * @property User $user
 *
 * @package App\Http\Models
 */
class ApiToken extends Model
{
	protected $table = 'api_tokens';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'expires_at'
	];

	protected $hidden = [
		// 'token',
		// 'created_at'
	];

	protected $fillable = [
		'user_id',
		'name',
		'type',
		'token',
		'expires_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
