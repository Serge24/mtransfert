<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserContact
 *
 * @property int $id
 * @property int $user_id
 * @property int $contact_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Http\Models
 */
class UserContact extends Model
{
	protected $table = 'user_contacts';

	protected $casts = [
		'user_id' => 'int',
		'contact_id' => 'int'
	];

	protected $hidden = [
		// 'created_at',
		// 'updated_at'
	];

	protected $fillable = [
		'user_id',
		'contact_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function contact()
	{
		return $this->belongsTo(User::class, 'contact_id', 'id');
	}
}
