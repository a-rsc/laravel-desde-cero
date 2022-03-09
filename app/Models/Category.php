<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['category'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
