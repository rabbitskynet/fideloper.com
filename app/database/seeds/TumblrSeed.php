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

        // Roll through each article
        foreach( $articles as $article )
        {
            if ( $article->state !== "published" )
            {
                continue;
            }

           switch($article->type)
           {
                case 'link' :
                    $this->createLink($article);
                    break;
                case 'photo' :
                    $this->createPhoto($article);
                    break;
                case 'text' :
                default :
                    if( $article->title === "" ) { continue; } // This happened somehow, but on a worthless post
                    $this->createText($article);
                    break;
           }
        }

    }

    protected function createText($article)
    {   
        $createdAt = new DateTime('@'.$article->timestamp);

        $newArticle = Article::create(array(
            'user_id' => 1,
            'status_id' => 1,
            'title' => $article->title,
            'url_title' => $article->slug,
            'excerpt' => $this->generateExcerpt($article->body),
            'content' => $article->body,
            'created_at' => $createdAt,
            'updated_at' => new DateTime // Import date
        ));

        // Update the date, since Article::create() ignores the set DateTime
        DB::table('articles')->where('url_title', $article->slug)->update([ 'created_at' => $createdAt->format( Article::getDateFormat() ) ]);

        // Add tags
        foreach ( $article->tags as $tag )
        {
            $this->addTag($newArticle->id, $tag);
        }
    }

    protected function createLink($article)
    {   
        $createdAt = new DateTime('@'.$article->timestamp);

        $newArticle = Article::create(array(
            'user_id' => 1,
            'status_id' => 1,
            'title' => $article->title,
            'url_title' => $article->slug,
            'excerpt' => "[{$article->url}]({$article->url})",
            'content' => "[{$article->url}]({$article->url})",
            'created_at' => $createdAt,
            'updated_at' => new DateTime
        ));

        // Update the date, since Article::create() ignores the set DateTime
        DB::table('articles')->where('url_title', $article->slug)->update([ 'created_at' => $createdAt->format( Article::getDateFormat() ) ]);

        // Add tags
        foreach ( $article->tags as $tag )
        {
            $this->addTag($newArticle->id, $tag);
        }
    }

    protected function createPhoto($article)
    {   
        $createdAt = new DateTime('@'.$article->timestamp);

        $newArticle = Article::create(array(
            'user_id' => 1,
            'status_id' => 1,
            'title' => 'A Photo',
            'url_title' => $article->id.'-'.$article->slug,
            'excerpt' => $this->generateExcerpt($article->caption),
            'content' => $article->caption,
            'created_at' => $createdAt,
            'updated_at' => new DateTime
        ));

        // Update the date, since Article::create() ignores the set DateTime
        DB::table('articles')->where('url_title', $article->slug)->update([ 'created_at' => $createdAt->format( Article::getDateFormat() ) ]);

        // Add tags
        foreach ( $article->tags as $tag )
        {
            $this->addTag($newArticle->id, $tag);
        }
    }

    protected function generateExcerpt($content)
    {
        $firstParagrah = strpos($content, "\n");

        if ( $firstParagrah !== FALSE )
        {
            $excerpt = substr($content, 0, $firstParagrah);
        } else
        {
            // Sucks but "works"
            $words = explode(' ', $content);

            $wordcount = 0;
            $excerpt = '';

            while($wordcount < 49)
            {
                if( isset($words[$wordcount]) )
                {
                    $excerpt .= $words[$wordcount];
                }
                $wordcount ++;
            }
        }

        return $excerpt;
    }

    protected function addTag($article_id, $tag)
    {
        $foundTag = Tag::where('name', $tag)->first();

        if( count($foundTag) === 0 )
        {
            // Create Tag
            $foundTag = Tag::create(array(
                'name' => $tag,
                'url_name' => $this->urlFriendly($tag),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }

        // Add relationship
        TagArticle::create(array(
            'tag_id' => $foundTag->id,
            'article_id' => $article_id
        ));

            
    }

    protected function urlFriendly($string)
    {
        return str_replace(' ', '-', strtolower( trim($string) ) );
    }
}