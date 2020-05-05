<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'reactjs', 'angularjs', 'vuejs', 'php',
            'golang', 'web-development', 'full-stack',
            'wysiwyg', 'youtube-api', 'rest-api',
            'jsonwebtoken', 'microservices',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
