<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VisitedRecord
 *
 * @property int $id
 * @property int $user_id
 * @property int $customer_id
 * @property int|null $menu_id
 * @property string|null $memo
 * @property string|null $visited_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Photo[] $photo
 * @property-read int|null $photo_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VisitedRecord whereVisitedAt($value)
 * @mixin \Eloquent
 */
class VisitedRecord extends Model
{
    protected $fillable = ['user_id', 'customer_id', 'menu_id', 'memo', 'image', 'visited_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}