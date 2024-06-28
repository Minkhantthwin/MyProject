<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use \App\Models\Blog;
use \App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       
        Category::truncate();
        Customer::truncate();
        User::truncate();
        Blog::truncate();
        
        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);

        $frontend=Category::factory()->create(['category_name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['category_name'=>'backend','slug'=>'backend']);

        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id, 'user_id'=>$aungaung->id]);
        Blog::factory(25)->create(['category_id'=>$frontend->id]);
        Blog::factory(25)->create(['category_id'=>$backend->id]);

        Customer::factory(2)->create();


        // $frontend=Category::create([
        //  'category_name'=>'frontend',
        //  'slug'=>'frontend'
        // ]);

        // $backend=Category::create([
        //     'category_name'=>'backend',
        //     'slug'=>'backend'
        //    ]);
        
        // \App\Models\Blog::create([
        //   'title'=>'frontend post',
        //   'slug'=>'frontend-post',
        //   'intro'=>'This is first Intro',
        //   'body'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt culpa architecto illo sed aperiam minima, iusto necessitatibus. Ad repellendus esse officia commodi veritatis asperiores cum quas ipsum deleniti, voluptas unde.',
        //   'category_id'=>$frontend->id
        // ]);

        // \App\Models\Blog::create([
        //     'title'=>'backend post',
        //     'slug'=>'backend-post',
        //     'intro'=>'This is Second Intro',
        //     'body'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt culpa architecto illo sed aperiam minima, iusto necessitatibus. Ad repellendus esse officia commodi veritatis asperiores cum quas ipsum deleniti, voluptas unde.',
        //     'category_id'=>$backend->id
        //   ]);

    }
}
