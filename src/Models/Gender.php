<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель Gender
 */
class Gender extends Model
{
    protected $table = 'genders';
    protected $primaryKey = 'id';

    protected $fillable = ['code', 'description'];

    public $rules = [
        'code'        => 'required|numeric',
        'description' => 'required',
    ];

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }
}
