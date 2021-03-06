<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SalesHistory
 *
 * @property int $id
 * @property int $shop_id
 * @property int $customer_id
 * @property int $visited_id
 * @property int $menu_id
 * @property string $menu_name
 * @property int $price_sold
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Menu $menu
 * @property-read \App\Models\Shop $shop
 * @property-read \App\Models\VisitedRecord $visited_record
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereMenuName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory wherePriceSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesHistory whereVisitedId($value)
 * @mixin \Eloquent
 */
class SalesHistory extends Model
{
    protected $casts = [
        'id' => 'int',
        'shop_id' => 'int',
        'customer_id' => 'int',
        'record_id' => 'int',
        'menu_id' => 'int',
        'price_sold' => 'int',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function visited_record()
    {
        return $this->belongsTo(VisitedRecord::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
