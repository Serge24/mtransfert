<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalePoint
 *
 * @property int $id
 * @property string $name
 * @property int $manager
 * @property string|null $contact
 * @property string|null $code
 * @property int $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Country $country
 * @property User $user
 * @property Collection|Transaction[] $transactions
 * @property Collection|User[] $users
 *
 * @package App\Http\Models
 */
class SalePoint extends Model
{
    protected $casts = [
        'manager' => 'int',
        'country_id' => 'int',
    ];

    protected $fillable = [
        'name',
        'manager',
        'contact',
        'code',
        'state',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'manager');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
