@extends('layouts.site')

@if ( $context['where'] === 'admin' )
    @section('adminhead')
        <nav class="row" id="adminhead">
            <div class="sixteen columns">
                <a href="{{ $context['back_link'] }}">&laquo; Back to Edit Article</a>
            </div>
        </nav>
    @stop
@endif

@section('sidebar')
    @parent
    <ul class="archive">
        <li class="title"><h5 class="header">Recent Articles</h5></li>
        @foreach($recents as $recent)
        <li><a href="/{{ $recent->url_title }}"><i class="icon-right-open-mini"></i>{{ $recent->title }}</a></li>
        @endforeach
    </ul>
    <ul class="archive">
        <li class="title"><h5 class="header">Other Writings</h5></li>
        <li><a href="http://net.tutsplus.com/tutorials/php/laravel-4-a-start-at-a-restful-api/"><i class="icon-right-open-mini"></i>Laravel 4 REST API</a></li>
        <li><a href="http://net.tutsplus.com/tutorials/php/how-to-write-testable-and-maintainable-code-in-php/"><i class="icon-right-open-mini"></i>Testable/Maintainable PHP</a></li>
    </ul>
@stop

@section('content')
<article class="twelve columns post single">
  <div class="row">
    <div class="content">
        <h2 class="title">{{ $article->title }}</h2>
        <ul class="tags meta clearfix">
	    <li class="time"><time>{{ ExpressiveDate::make($article->created_at)->getRelativeDate() }}</time></li>
            @foreach( $article->tags as $tag )
            <li class="primary badge"><i class="icon-tag"></i><a href="/tag/{{$tag->url_name}}">{{ $tag->name }}</a></li>
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
    </div><!-- end content -->
  </div>
</article><!-- end article -->
@stop
