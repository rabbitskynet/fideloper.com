<?php

class ArticleSeed extends Seeder {

    public function run()
    {
        DB::table('articles')->delete();

        Article::create(array(
            'user_id' => 1,
            'status_id' => 1, // Published
            'title' => 'This is my first article!',
            'url_title' => 'my_first_article',
            'excerpt' => 'This is the explaining to my first article here and there.',
            'content' => "This should be really long, and contain markdown. And be properly filtered. That's hard stuff!",
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Article::create(array(
            'user_id' => 1,
            'status_id' => 1, // Published
            'title' => 'This is my second article!',
            'url_title' => 'my_second_article',
            'excerpt' => 'This is the explaining to my first article here and there.',
            'content' => "This should be really long, and contain markdown. And be properly filtered. That's hard stuff!",
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

        Article::create(array(
            'user_id' => 1,
            'status_id' => 1, // Published
            'title' => 'This is my third article!',
            'url_title' => 'my_third_article',
            'excerpt' => 'This is the explaining to my first article here and there.',
            'content' => "This should be really long, and contain markdown. And be properly filtered. That's hard stuff!",
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}