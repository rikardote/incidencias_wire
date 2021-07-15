<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

    protected $table = 'qnas';

    protected $fillable = ['qna', 'year', 'description'];

    public function getShortnameAttribute($value)
    {
       return $this->qna. '/' . $this->year;
    }

    public function getFullnameAttribute($value)
    {
       return $this->qna. '/' . $this->year. ' - '.$this->description;
    }

    public function getQnaAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }

}
