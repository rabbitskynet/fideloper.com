<?php

use Fideloper\Resource\Eloquent\Resource;

class Tag extends Resource {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    public function articles()
    {
        // Probably shouldbe hasMany
        return $this->belongsToMany('Article', 'tags_articles', 'tag_id', 'article_id');
    }

    public function setTagsForArticle($article_id, Array $tags, $delete_first=true)
    {
        if( $delete_first )
        {
            // Delete all tags for article
            DB::table('tags_articles')->where('article_id', $article_id)->delete();
        }

        foreach( $tags as $tag )
        {
            $this->addTagForArticle($article_id, $tag);
        }

        return $this;
    }

    public function addTagForArticle($article_id, $tag)
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

        return $this;
    }

    protected function urlFriendly($string)
    {
        return str_replace(' ', '-', strtolower( trim($string) ) );
    }

    public function tagsFromString($tags)
    {
        $unformattedTags = trim($tags);

        if( strlen($unformattedTags) > 0 )
        {
            $formattedTags = str_replace(', ', ',', $unformattedTags);
            $tags = explode(',', $formattedTags);
        }

        return $tags;
    }

}