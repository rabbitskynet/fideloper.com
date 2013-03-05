<?php

class ArticleTagSeed extends Seeder {

    public function run()
    {
        DB::table('tags_articles')->delete();

        // Articles: 1,2,3
        // Tags: 1,2,3
        
        // Article 1
        TagArticle::create(array(
            'tag_id' => 1,
            'article_id' => 1,
        ));
        TagArticle::create(array(
            'tag_id' => 2,
            'article_id' => 1,
        ));

        // Article 2
        TagArticle::create(array(
            'tag_id' => 3,
            'article_id' => 2,
        ));

        // Article 3
        TagArticle::create(array(
            'tag_id' => 1,
            'article_id' => 3,
        ));
        TagArticle::create(array(
            'tag_id' => 2,
            'article_id' => 3,
        ));
        TagArticle::create(array(
            'tag_id' => 3,
            'article_id' => 3,
        ));
    }
}