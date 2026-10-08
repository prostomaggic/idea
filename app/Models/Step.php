<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /** @use HasFactory<\Database\Factories\StepFactory> */
    use HasFactory;

    public function idea(){
        return $this->belongsTo(Idea::class);
    }

    public function definition(){
        return [
           'idea_id' => Idea::factory(),
           'description'=>fake()->sentence(),
           'completed' => false,

        ];
    }
}
