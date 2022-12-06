<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Модель Author
 */
class Author extends Model
{
    protected $table = 'authors';
    protected $primaryKey = 'id';

    protected $fillable = ['last_name', 'first_name', 'second_name'];

    public $rules = [
        'last_name'   => 'required',
        'first_name'  => 'required',
        'second_name' => 'required',
    ];

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
