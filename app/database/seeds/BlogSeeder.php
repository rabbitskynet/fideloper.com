<?php

class BlogSeeder extends Seeder
{
    public function run()
    {

        DB::table('tags')->truncate();
        DB::table('tags_articles')->truncate();
        DB::table('users')->truncate();
        DB::table('articles')->truncate();
        DB::table('statuses')->truncate();

        $this->createTags();
        $this->createUsers();
        $this->createStatuses();
        $this->createArticles(5);
        $this->assignTagsToArticles();

    }

    private function createTags()
    {
        $tags = array(
            array(
                'name'      => 'php',
                'url_name'  => 'php',
            ),
            array(
                'name'      => 'laravel',
                'url_name'  => 'laravel',
            ),
            array(
                'name'      => 'javascript',
                'url_name'  => 'javascript',
            ),
            array(
                'name'      => 'ruby',
                'url_name'  => 'ruby',
            ),
            array(
                'name'      => 'testing',
                'url_name'  => 'testing',
            ),
        );

        foreach ($tags as $tagInfo) {
            $tag = new Tag();
            $tag->name      = $tagInfo['name'];
            $tag->url_name  = $tagInfo['url_name'];
            $tag->save();
            sleep(1); // for non cache trolling
        }
    }

    private function createUsers()
    {
        $users = array(
            array(
                'email'     => 'admin@myawesomeblog.com',
                'password'  => 'secret'
            )
        );

        foreach ($users as $userInfo) {
            $user = new User();
            $user->email    = $userInfo['email'];
            $user->password = md5($userInfo['password']);
            $user->save();
            sleep(1); // for non cache trolling
        }
    }

    private function createStatuses()
    {
        $statuses = array(
            array(
                'name'      => 'published',
                'url_name'  => 'published',
            )
        );

        foreach ($statuses as $statusInfo) {
            $status = new Status();
            $status->name       = $statusInfo['name'];
            $status->url_name   = $statusInfo['url_name'];
            $status->save();
            sleep(1); // for non cache trolling
        }
    }
    private function createArticles($numArticles)
    {
        $loremIpsum = <<<LOREM
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet enim commodo, dignissim tortor ut, vehicula ante. Praesent luctus mattis ipsum et mattis. Phasellus pretium tortor augue, sit amet vulputate nunc porttitor ut. Morbi in cursus diam. Nunc imperdiet nisl et erat blandit, a pharetra lectus aliquet. Vestibulum sed laoreet nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent vitae rutrum metus. Nam consectetur augue ut nulla lobortis laoreet. Pellentesque non mi sem. In vulputate, felis in pellentesque posuere, mi elit vehicula nisi, vitae ornare est justo at diam. Nulla a purus quam. Nunc non adipiscing velit. Quisque vel nisl et nunc pellentesque ultricies quis a diam. Mauris ultricies ipsum neque, ac gravida sem elementum ac.
Quisque faucibus tellus ac dignissim blandit. Suspendisse pellentesque tempus molestie. In dignissim, tellus vel euismod viverra, justo dui semper libero, sit amet mollis erat est eget enim. Nullam vehicula gravida eros. Aliquam sed hendrerit enim. Cras enim sem, malesuada molestie nibh sit amet, viverra malesuada augue. Morbi mi nisl, tincidunt ac adipiscing vel, auctor auctor massa. Ut vehicula luctus libero, sed suscipit metus ultricies sit amet. Donec pellentesque urna id eleifend gravida. Vestibulum felis nisl, faucibus eget lacus vel, elementum bibendum tellus. Donec aliquam, turpis sit amet facilisis gravida, arcu dui hendrerit nunc, id laoreet neque purus vel ipsum. Mauris erat augue, accumsan sed tincidunt ornare, consectetur et eros. Phasellus elit turpis, vestibulum sed augue non, auctor viverra eros. Quisque convallis suscipit dapibus. Sed tincidunt, odio et rutrum auctor, orci arcu facilisis turpis, ut tincidunt neque magna et orci.
Vestibulum sed blandit tellus. Fusce at mauris eget orci condimentum semper. Aliquam a neque lacus. Praesent congue, dui vulputate ullamcorper laoreet, quam nisi bibendum arcu, et malesuada neque risus non turpis. In vehicula libero ac tempus aliquet. Morbi scelerisque eget est non dignissim. Aenean condimentum elit vel massa elementum scelerisque ac vel sem. Sed condimentum dapibus turpis sed iaculis. Ut interdum risus et elit dignissim fringilla. Maecenas dignissim neque quam, placerat dapibus nisl bibendum ut. Sed at est ac nunc ultrices adipiscing vel id nisl. In eget lectus cursus, lobortis lectus non, ullamcorper sem. Vivamus vulputate augue odio, a scelerisque lectus fermentum sed. Etiam mattis mauris a libero pharetra luctus sed at mi. Integer quis consequat nisi. Vivamus nulla odio, mattis ut quam ut, fringilla commodo lacus.
Curabitur hendrerit bibendum est. Sed condimentum congue justo, sed sollicitudin velit lobortis id. Praesent at ipsum ac justo dictum placerat sed et urna. Vestibulum dignissim nunc malesuada dictum porttitor. Aenean ut scelerisque dui, at rutrum turpis. Sed hendrerit enim orci, vitae fringilla sem fringilla sed. Ut egestas nec sapien ac imperdiet. Etiam scelerisque, neque eget faucibus ultrices, justo purus ultricies ante, sit amet eleifend est ligula sit amet mauris. Quisque ac tellus pellentesque, hendrerit sem quis, ornare erat. Vivamus id semper dolor, lobortis scelerisque mi.
Nulla dictum vehicula odio, eget tincidunt lectus pretium non. Aliquam libero orci, pretium non nisl sit amet, consequat interdum mi. Aliquam erat volutpat. Phasellus pellentesque gravida condimentum. Donec vel malesuada justo, in pharetra quam. Nunc et magna eu nisl consectetur varius nec faucibus arcu. Praesent pharetra pretium nisi vitae venenatis. Suspendisse consequat arcu sed cursus eleifend. Quisque sodales orci sed condimentum semper. Sed sit amet porta libero, nec pellentesque sem. Curabitur sit amet eros tincidunt enim commodo elementum quis quis nisl. Curabitur ultricies mauris ac libero vulputate, nec varius lacus placerat.
LOREM;

        for ($i = 0; $i < $numArticles; $i++) {
            $article = new Article();
            $article->user_id       = User::first()->id;
            $article->status_id     = Status::first()->id;
            $article->title         = 'My awesome post number: ' . $i;
            $article->excerpt       = substr($loremIpsum, 0, 100);
            $article->content       = $loremIpsum;
            $article->save();
            sleep(1); // for non cache trolling
        }
    }

    private function assignTagsToArticles()
    {
        $articles   = Article::all();
        $tags       = Tag::all();

        foreach ($articles as $article) {
            // get two random tag ids
            foreach (array_rand($tags->toArray(), 2) as $tag) {
                $tagId = $tags->toArray()[$tag]['id'];
                TagArticle::create(array(
                    'tag_id' => $tagId,
                    'article_id' => $article->id
                ));
                sleep(1); // for non cache trolling
            }
        }
    }
}