<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->word();
            $newProject->description = $faker->text();
            $newProject->type = $faker->word();
            $newProject->image = 'https://picsum.photos/200/300';
            $newProject->client = $faker->domainName();
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->save();
        }
    }
}
