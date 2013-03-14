@extends('layouts.site')
@section('content')
<section class="twelve columns listing">
  <header><h2>Articles</h2></header>
  @foreach( $articles as $article )
  <article class="post">
    <h3><a href="/{{ $article->url_title }}">{{ $article->title }}</a></h3>
    {{ $article->excerpt }}
  </article><!-- end article -->
  @endforeach
  <div class="pagi">
    <ul>
      <li class="default badge"><a href="#">Prev</a></li>
      <li class="primary badge"><a href="#">2</a></li>
      <li class="default badge"><a href="#">3</a></li>
      <li class="default badge"><a href="#">4</a></li>
      <li class="default badge"><a href="#">Next</a></li>
    </ul>
  </div>
</section>
@stop        