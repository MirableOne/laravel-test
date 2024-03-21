<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersIds = User::all()->pluck('id')->toArray();

        foreach (range(0, 2) as $index) {
            $userId = $usersIds[$index];
            foreach (range(1, 3) as $index) {
                Task::factory()->create([
                    'user_id' => $userId,
                    'title' => 'Test'.$index,
                    'description' => fake()->text(200),
                    'done' => false,
                    'deleted' => false,
                ]);
            }
        }
    }
}
