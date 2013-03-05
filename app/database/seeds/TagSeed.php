<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tags')->delete();

        Tag::create(array(
            'name' => 'Laravel',
            'url_name' => 'laravel',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Tag::create(array(
            'name' => 'API',
            'url_name' => 'api',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Tag::create(array(
            'name' => 'ETags',
            'url_name' => 'etags',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}