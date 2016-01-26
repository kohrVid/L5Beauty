<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
	public function run()
	{
		App\Post::truncate();

		factory(App\Post::class, 20)->create();
	}
/*   The following didn't work the way it did in the tutorial:
 *   public function run()
    {
	    Model::unguard();

	    $this->call("PostTableSeeder");
    }
 */
}
