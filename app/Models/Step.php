<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\StepFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /** @use HasFactory<StepFactory> */
    use HasFactory;

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function definition(): array
    {
        return [
            'idea_id' => Idea::factory(),
            'description' => fake()->sentence(),
            'completed' => false,

        ];
    }
}
