<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property int $id
 * @property string $name
 * @property string $iso_code
 * @property string $name_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Http\Models
 */
class Country extends Model
{
	protected $table = 'countries';

	protected $hidden = [
		// 'created_at',
		// 'updated_at'
	];

	protected $fillable = [
		'name',
		'iso_code',
		'name_code'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
