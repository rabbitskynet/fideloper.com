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
        $this->call('TagSeed');
        
        // Has relationship columns
        $this->call('ArticleSeed');
        $this->call('ArticleTagSeed');
	}

}