<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\User as AppUser;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string|null $locale
 * @property string|null $gender
 * @property string|null $status
 * @property string|null $role_level
 * @property string $no_account
 * @property int|null $country_id
 * @property string|null $image
 * @property string $login
 * @property string $password
 * @property int|null $sale_point_id
 * @property int $is_temp_user
 * @property string|null $momo_api_key
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Country|null $country
 * @property SalePoint|null $sale_point
 * @property Collection|ApiToken[] $api_tokens
 * @property Example $example
 * @property Collection|SalePoint[] $sale_points
 * @property Collection|Transaction[] $transactions
 * @property Collection|UserAccount[] $user_accounts
 * @property Collection|UserContact[] $user_contacts
 *
 * @package App\Http\Models
 */
class User extends AppUser
{

}
