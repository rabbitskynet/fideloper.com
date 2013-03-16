@extends('layouts.site')
@section('sidebar')
    @parent
    <ul class="archive">
        <li class="title"><h5 class="header">Recent Articles</h5></li>
        @foreach($recents as $recent)
        <li><a href="/{{ $recent->url_title }}"><i class="icon-right-open-mini"></i>{{ $recent->title }}</a></li>
        @endforeach
    </ul>
@stop
@section('content')
<article class="twelve columns post single">
  <div class="row">
    <aside class="meta four columns clearfix">
      <time>{{ ExpressiveDate::make($article->created_at)->getRelativeDate() }}</time>
      <ul>
        @foreach( $article->tags as $tag )
        <li><a href="/tag/{{$tag->url_name}}"><span>#</span>{{ $tag->name }}</a></li>
        @endforeach
      </ul>
    </aside>

    <div class="content twelve columns">
        <h2 class="title">{{ $article->title }}</h2>
        {{ \Michelf\MarkdownExtra::defaultTransform($article->content) }}
    </div><!-- end content -->
  </div>
</article><!-- end article -->
@stop