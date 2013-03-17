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

  <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png" />

  <link type="text/plain" rel="author" href="http://fideloper.com/humans.txt" />

  <link rel="stylesheet" href="/static/css/gumby.css">
  <script src="/static/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div class="container">
    @section('header')
    <header class="row" id="gheader">
      <div class="four columns" id="brand">
        <h1><a href="/">Fideloper</a></h1>
        <p class="whoami">Lead dev @digitalsurgeons. I do LAMP, Laravel, Nodejs, Python, and lots of server stuff.</p>
      </div>
      <div class="four columns push_eight" id="avatar">
        <a href="/"><img src="/static/facebook.png" alt="" /></a>
      </div>
    </header>
    @show

    <section id="content">
      <div class="row">

        @yield('content')

        <?php /*
        <aside class="four columns" id="gsidebar">
          @section('sidebar')
          <ul class="links">
            <li id="rss"><a href="#"><i class="icon-rss"></i>RSS</a></li>
            <li id="archive"><a href="#"><i class="icon-archive"></i>Archive</a></li>
            <li id="twitter"><a href="http://twitter.com/fideloper"><i class="icon-twitter"></i>Fideloper</a></li>
          </ul>
          @show
        </aside>
        */ ?>

      </div><!-- end .row -->

    </section><!-- end  #content -->

    @section('footer')
    <footer id="gfoot">
      <section class="row">
        <div class="twelve columns">
          <a href="http://twitter.com/fideloper" title="twitter">@fideloper</a>
        </div>
      </section>
    </footer>
    @show

  </div><!-- end container -->

  @yield('scripts')

</body>
</html>
