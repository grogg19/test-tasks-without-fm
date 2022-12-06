<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Модель Customer
 */
class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $fillable = ['first_name', 'last_name', 'birth_date'];

    public $rules = [
        'last_name'  => 'required',
        'first_name' => 'required',
        'birth_date' => 'required|date',
    ];

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'code');
    }

    /**
     * @return BelongsToMany
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'owners');
    }
}
