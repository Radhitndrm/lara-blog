<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\category;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(20)->create();
        Post::factory(200)->create();
        // User::create([
        //     'name' => 'akmal writer',
        //     'email' => 'akmal@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'jamal writer',
        //     'email' => 'jamal@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
 
        category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul_pertama',
        //     'excerpt' => 'excerpt pertama',
        //     'body' =>  '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sequi nihil laudantium quidem molestiae maxime quam architecto doloremque numquam assumenda. Veniam sed, nesciunt rem id quibusdam mollitia reiciendis ad aliquam, ullam voluptates obcaecati illum molestias sequi voluptatibus cupiditate quas inventore commodi eaque?</p> <p> Iure sit amet ex illo perferendis, dolor quia incidunt repudiandae sed tempore doloribus at harum non, doloremque odio ipsa. Eligendi dolorum sapiente consectetur amet adipisci delectus possimus impedit, nemo exercitationem suscipit expedita necessitatibus est accusamus, earum iure qui facere deserunt! Nesciunt dolor voluptas temporibus, qui vitae perspiciatis odit harum est similique atque facere recusandae accusamus ad eligendi alias.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul kedua',
        //     'slug' => 'judul_kedua',
        //     'excerpt' => 'excerpt kedua',
        //     'body' =>  '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sequi nihil laudantium quidem molestiae maxime quam architecto doloremque numquam assumenda. Veniam sed, nesciunt rem id quibusdam mollitia reiciendis ad aliquam, ullam voluptates obcaecati illum molestias sequi voluptatibus cupiditate quas inventore commodi eaque?</p> <p> Iure sit amet ex illo perferendis, dolor quia incidunt repudiandae sed tempore doloribus at harum non, doloremque odio ipsa. Eligendi dolorum sapiente consectetur amet adipisci delectus possimus impedit, nemo exercitationem suscipit expedita necessitatibus est accusamus, earum iure qui facere deserunt! Nesciunt dolor voluptas temporibus, qui vitae perspiciatis odit harum est similique atque facere recusandae accusamus ad eligendi alias.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul ketiga',
        //     'slug' => 'judul_ketiga',
        //     'excerpt' => 'excerpt ketiga',
        //     'body' =>  '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sequi nihil laudantium quidem molestiae maxime quam architecto doloremque numquam assumenda. Veniam sed, nesciunt rem id quibusdam mollitia reiciendis ad aliquam, ullam voluptates obcaecati illum molestias sequi voluptatibus cupiditate quas inventore commodi eaque?</p> <p> Iure sit amet ex illo perferendis, dolor quia incidunt repudiandae sed tempore doloribus at harum non, doloremque odio ipsa. Eligendi dolorum sapiente consectetur amet adipisci delectus possimus impedit, nemo exercitationem suscipit expedita necessitatibus est accusamus, earum iure qui facere deserunt! Nesciunt dolor voluptas temporibus, qui vitae perspiciatis odit harum est similique atque facere recusandae accusamus ad eligendi alias.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul keempat',
        //     'slug' => 'judul_keempat',
        //     'excerpt' => 'excerpt keempat',
        //     'body' =>  '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sequi nihil laudantium quidem molestiae maxime quam architecto doloremque numquam assumenda. Veniam sed, nesciunt rem id quibusdam mollitia reiciendis ad aliquam, ullam voluptates obcaecati illum molestias sequi voluptatibus cupiditate quas inventore commodi eaque?</p> <p> Iure sit amet ex illo perferendis, dolor quia incidunt repudiandae sed tempore doloribus at harum non, doloremque odio ipsa. Eligendi dolorum sapiente consectetur amet adipisci delectus possimus impedit, nemo exercitationem suscipit expedita necessitatibus est accusamus, earum iure qui facere deserunt! Nesciunt dolor voluptas temporibus, qui vitae perspiciatis odit harum est similique atque facere recusandae accusamus ad eligendi alias.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        
    }
}
