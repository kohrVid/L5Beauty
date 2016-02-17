<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		Model::unguard();

		$this->call("TagTableSeeder");
		$this->call("PostTableSeeder");

		Model::reguard();
	}
/*		App\Post::truncate();

		factory(App\Post::class, 20)->create();
	}*/
/*   The following didn't work the way it did in the tutorial:
 *   public function run()
    {
	    Model::unguard();

	    $this->call("PostTableSeeder");
    }
 */
}
