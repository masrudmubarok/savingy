<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'type',
        'amount',
    ];

    public static function getAllFinances()
    {
        return self::orderBy('date')->get();
    }

    public static function createFinance(array $data)
    {
        return self::create($data);
    }

    public static function findFinance(int $id)
    {
        return self::findOrFail($id);
    }

    public function updateFinance(array $data)
    {
        return $this->update($data);
    }

    public function deleteFinance()
    {
        return $this->delete();
    }
}