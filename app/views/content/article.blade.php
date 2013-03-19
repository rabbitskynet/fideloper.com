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

    </div><!-- end content -->
  </div>
</article><!-- end article -->
@stop