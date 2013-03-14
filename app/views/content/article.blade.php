@extends('layouts.site')
@section('sidebar')
    @parent
    <ul class="archive">
        <li class="title"><h5 class="header">Recent Articles</h5></li>
        <li class="first"><a href="#"><i class="icon-right-open-mini"></i>ETag's and Conditional Get's in Laravel 4</a></li>
        <li><a href="#"><i class="icon-right-open-mini"></i>User and Group Permissions, with chmod and Apache</a></li>
        <li><a href="#"><i class="icon-right-open-mini"></i>Advice on Unit Testing - Test private protected methods?</a></li>
    </ul>
@stop
@section('content')
<article class="twelve columns post single">
  <div class="row">
    <aside class="meta four columns clearfix">
      <time>{{ ExpressiveDate::make($article->created_at)->getRelativeDate() }}</time>
      <ul>
        @foreach( $article->tags as $tag )
        <li><a href="#"><span>#</span>{{ $tag->name }}</a></li>
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