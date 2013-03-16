@extends('layouts.site')
@section('content')
<section class="twelve columns listing">
  <header><h2>Articles</h2></header>
  @foreach( $articles as $article )
  <article class="post">
    <h3><a href="/{{ $article->url_title }}">{{ $article->title }}</a></h3>
    {{ \Michelf\MarkdownExtra::defaultTransform($article->excerpt) }}
  </article><!-- end article -->
  @endforeach

  {{ $articles->links() }}
</section>
@stop        