<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()
            ->count(50)
            ->sequence(function (Sequence $sequence) {
                return [
                    'user_id' => rand(2, 1),
                    "body" => "Message " . $sequence->index + 1,
                    "created_at" => now()->subYear()->addHours($sequence->index),
                ];
            })
            ->create([
                'room_id' => 1,
            ]);
    }
}
