<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');
        foreach ($projects as $project) {
            $newPost = new Project();
            $newPost->user_id = 1;
            $newPost->image = $project['image'];
            $newPost->thumb = $project['thumb'];
            $newPost->title = $project['title'];
            $newPost->description = $project['description'];
            $newPost->save();
        }
    }
}
