<?php

class TumblrSeed extends Seeder {

    public function run()
    {
        DB::table('articles')->delete();

        $page1 = file_get_contents('http://api.tumblr.com/v2/blog/fideloper.tumblr.com/posts?api_key=jegqwALiwZvuI5DqiCmrZka1vIY10SKcJMCt5v8ABofwGzAxWT&filter=raw&limit=20');

        $articles1 = json_decode($page1);

        $page2 = file_get_contents('http://api.tumblr.com/v2/blog/fideloper.tumblr.com/posts?api_key=jegqwALiwZvuI5DqiCmrZka1vIY10SKcJMCt5v8ABofwGzAxWT&filter=raw&limit=20&offset=20');

        $articles2 = json_decode($page2);

        $page3 = file_get_contents('http://api.tumblr.com/v2/blog/fideloper.tumblr.com/posts?api_key=jegqwALiwZvuI5DqiCmrZka1vIY10SKcJMCt5v8ABofwGzAxWT&filter=raw&limit=20&offset=40');

        $articles3 = json_decode($page3);


        $articles = array();

        foreach ( $articles1->response->posts as $article)
        {
            $articles[] = $article;
        }

        foreach ( $articles2->response->posts as $article)
        {
            $articles[] = $article;
        }

        foreach ( $articles3->response->posts as $article)
        {
            $articles[] = $article;
        }



        foreach( $articles as $article )
        {
           switch($article->type)
           {
                case 'link' :
                    break;
                case 'photo' :
                    break;
                case 'text' :
                default :
                    break;
           }
        }

        /*

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

        */
    }

    protected function createText($article)
    {

    }

    protected function createLink($article)
    {

    }

    protected function createPhoto($article)
    {

    }
}