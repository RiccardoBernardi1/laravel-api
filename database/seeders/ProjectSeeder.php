<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();
        for($i=0;$i<10;$i++){
            $type=Type::inRandomOrder()->first();
            $new_project= new Project();
            $new_project->name=$faker->sentence(3);
            $new_project->slug=Str::slug($new_project->name,'-');
            $new_project->description=$faker->paragraph(2);
            $new_project->client=$faker->company();
            $new_project->type_id=$type->id;
            $new_project->save();
        }
    }
}
