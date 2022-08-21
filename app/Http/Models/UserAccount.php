<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAccount
 *
 * @property int $id
 * @property string $number
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Http\Models
 */
class UserAccount extends Model
{
	protected $table = 'user_accounts';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $hidden = [
		// 'created_at',
		// 'updated_at'
	];

	protected $fillable = [
		'number',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
