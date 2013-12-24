@extends('layouts.site')

@section('content')
<div class="col-main listing">
    <h1>#{{ $tag }}</h1>
    @foreach( $articles as $article )
    <article>
        <h1><a href="/{{ $article->url_title }}">{{ $article->title }}</a></h1>
        {{ \Michelf\MarkdownExtra::defaultTransform($article->excerpt) }}
    </article><!-- end article -->
    @endforeach

    {{ $articles->links() }}
</div>
@stop

@section('sidebar')
    @parent
    <h3>Tags</h3>
    <ul>
        @foreach($tags as $tag)
        <li><a href="/tag/{{ $tag->url_name }}"><i class="entypo chevron-small-right"></i>{{ $tag->name }} ({{ $tag->tag_count }})</a></li>
        @endforeach
    </ul>
@stop