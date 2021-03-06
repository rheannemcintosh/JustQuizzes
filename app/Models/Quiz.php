<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'minutes',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function storeQuiz($data) {
        return Quiz::create($data);
    }

    public function updateQuiz($data, $id) {
        return Quiz::find($id)->update($data);
    }

}
