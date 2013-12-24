@extends('layouts.site')

@if ( $context['where'] === 'admin' )
    @section('adminhead')
        <nav class="col-main">
            <a href="{{ $context['back_link'] }}">&laquo; Back to Edit Article</a>
        </nav>
    @stop
@endif

@section('sidebar')
    @parent
    <h3>Recent Articles</h3>
    <ul>
        @foreach($recents as $recent)
        <li><a href="/{{ $recent->url_title }}"><i class="entypo chevron-small-right"></i>{{ $recent->title }}</a></li>
        @endforeach
    </ul>
    <h3>Other Writings</h3>
    <ul>
        <li><a href="http://net.tutsplus.com/tutorials/php/laravel-4-a-start-at-a-restful-api/"><i class="entypo chevron-small-right"></i></i>Laravel 4 REST API</a></li>
        <li><a href="http://net.tutsplus.com/tutorials/php/how-to-write-testable-and-maintainable-code-in-php/"><i class="entypo chevron-small-right"></i></i>Testable/Maintainable PHP</a></li>
    </ul>
@stop

@section('content')
<div class="col-main single">
    <article class="post">
        <h1>{{ $article->title }}</h1>
        <ul class="tags meta clearfix">
            <li class="time"><time>{{ ExpressiveDate::make($article->created_at)->getRelativeDate() }}</time></li>
            @foreach( $article->tags as $tag )
            <li class="primary badge"><i class="entypo tag"></i><a href="/tag/{{$tag->url_name}}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>

        {{ \Michelf\MarkdownExtra::defaultTransform($article->content) }}

        @if ( $context['where'] !== 'admin' )
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'fideloper'; // required: replace example with your Disqus site shortname
            var disqus_url = 'http://fideloper.com/{{ $article->url_title }}';
            var disqus_title = "{{ $article->title }}";

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        @endif
    </article>
</div>
@stop
