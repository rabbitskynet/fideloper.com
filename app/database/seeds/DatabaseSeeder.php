<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        // No relationships columns
        $this->call('UserSeed');
        $this->call('StatusSeed');
        //$this->call('TagSeed');

        // Has relationship columns
        $this->call('TumblrSeed');      # Handles Articles, Tags and Article-Tag relationship
        //$this->call('ArticleSeed');
        //$this->call('ArticleTagSeed');
	}

}