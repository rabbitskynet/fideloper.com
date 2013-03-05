<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('statuses')->delete();

        Status::create(array(
            'name' => 'Published',
            'url_name' => 'published',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Status::create(array(
            'name' => 'Private',
            'url_name' => 'private',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Status::create(array(
            'name' => 'Draft',
            'url_name' => 'draft',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Status::create(array(
            'name' => 'Deleted',
            'url_name' => 'deleted',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        
    }
}