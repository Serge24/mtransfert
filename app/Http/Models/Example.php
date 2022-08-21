<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Example
 *
 * @property int $id
 * @property int $user_id
 *
 * @property User $user
 *
 * @package App\Http\Models
 */
class Example extends Model
{
	protected $table = 'example';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'id',
		'user_id'
	];

	/*public function user()
	{
		return $this->belongsTo(User::class);
	}*/
}
