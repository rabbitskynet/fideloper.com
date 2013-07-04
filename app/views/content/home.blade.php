@extends('layouts.site')
@section('content')
<section class="twelve columns listing">
  <header><h2>Articles</h2></header>
  @foreach( $articles as $article )
  <article class="post">
    <h3><a href="/{{ $article->url_title }}">{{ $article->title }}</a></h3>
    {{ \Michelf\MarkdownExtra::defaultTransform($article->excerpt) }}
    <div class="age"><a class="timeline {{ ViewHelper::ageClass($article) }}" style="width:{{ ViewHelper::percOfYear($article) }}%;" title="{{ ViewHelper::daysOld($article) }} days old"></a></div>
  </article><!-- end article -->
  @endforeach

  {{ $articles->links() }}
</section>
@stop

@section('sidebar')
    @parent
    <ul class="archive">
        <li class="title"><h5 class="header">Tags</h5></li>
        @foreach($tags as $tag)
        <li><a href="/tag/{{ $tag->url_name }}"><i class="icon-right-open-mini"></i>{{ $tag->name }} ({{ $tag->tag_count }})</a></li>
        @endforeach
    </ul>
@stop