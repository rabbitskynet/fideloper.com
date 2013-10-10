<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  @yield('header_meta')

  <link rel="shortcut icon" href="http://fideloper.com/favicon.png" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png" />

  <link type="text/plain" rel="author" href="http://fideloper.com/humans.txt" />

  <link rel="stylesheet" href="/static/css/gumby.css?v=1.1">
  <script src="/static/bower_components/gumby/js/libs/modernizr-2.6.2.min.js"></script>
</head>

<body>

  <div class="container">
    @yield('adminhead')

    @section('header')
    <header class="row" id="gheader">
      <div class="sixteen columns" id="avatar">
        <a href="/"><h1>Fideloper</h1><img src="/static/fideloper_circle_sm.jpg" alt="" /></a>
      </div>
    </header>
    @show

    <section id="content">
      <div class="row">

        @yield('content')

        <aside class="four columns" id="gsidebar">
          @section('sidebar')
          @show
        </aside>

      </div><!-- end .row -->

    </section><!-- end  #content -->

    @section('footer')
    <footer id="gfoot">
      <section class="row">
        <div class="twelve columns">
	  <ul class="links">
            <li id="rss"><a href="/feed"><i class="icon-rss"></i>RSS</a></li>
            <li id="twitter"><a href="https://twitter.com/fideloper"><i class="icon-twitter"></i>@Fideloper</a></li>
            <li id="twitter"><a href="https://github.com/fideloper"><i class="icon-github"></i>Github</a></li>
          </ul>
        </div>
      </section>
    </footer>
    @show

  </div><!-- end container -->

  @yield('scripts')

</body>
</html>
