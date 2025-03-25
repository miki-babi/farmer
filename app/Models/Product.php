<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit', 'farmer_id'];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
