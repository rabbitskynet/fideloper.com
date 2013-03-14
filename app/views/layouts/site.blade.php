<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Fideloper</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="humans.txt">

  <link rel="shortcut icon" href="/static/favicon.png" type="image/x-icon" />

  <!--Facebook Metadata /-->
  <meta property="fb:page_id" content="" />
  <meta property="og:image" content="" />
  <meta property="og:description" content=""/>
  <meta property="og:title" content=""/>

  <!--Google+ Metadata /-->
  <meta itemprop="name" content="">
  <meta itemprop="description" content="">
  <meta itemprop="image" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

  <link rel="stylesheet" href="/static/css/gumby.css">
  <!--
  We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
  However, there is a blank style.css in the css directory should you prefer
  <link rel="stylesheet" href="css/style.css">
  -->
  <script src="/static/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div class="container">
    @section('header')
    <header class="row" id="gheader">
      <div class="four columns" id="brand">
        <h1><a href="/">Fideloper</a></h1>
        <p class="whoami">Lead dev @digitalsurgeons. LAMP and Server. Open source.</p>
      </div>
      <div class="four columns push_eight" id="avatar">
        <a href="/"><img src="/static/facebook.png" alt="" /></a>
      </div>
    </header>
    @show

    <section id="content">
      <div class="row">
        
        @yield('content')
        
        <aside class="four columns" id="gsidebar">
          @section('sidebar')
          <ul class="links">
            <li id="rss"><a href="#"><i class="icon-rss"></i>RSS</a></li>
            <li id="archive"><a href="#"><i class="icon-archive"></i>Archive</a></li>
            <li id="twitter"><a href="#"><i class="icon-twitter"></i>Fideloper</a></li>
          </ul>
          @show
        </aside>

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

  @section('footer_scripts')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

  <script src="/static/js/libs/gumby.js"></script>
  <script src="/static/js/libs/ui/gumby.retina.js"></script>
  <script src="/static/js/libs/ui/gumby.fixed.js"></script>
  <script src="/static/js/libs/ui/gumby.skiplink.js"></script>
  <script src="/static/js/libs/ui/gumby.toggleswitch.js"></script>
  <script src="/static/js/libs/ui/gumby.checkbox.js"></script>
  <script src="/static/js/libs/ui/gumby.radiobtn.js"></script>
  <script src="/static/js/libs/ui/gumby.tabs.js"></script>
  <script src="/static/js/libs/ui/jquery.validation.js"></script>
  <script src="/static/js/plugins.js"></script>
  <script src="/static/js/main.js"></script>
  <!-- end scripts-->

  <script src="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function()
      {
          $('.post pre, table code').addClass('prettyprint');
          prettyPrint();
      });
  </script>


  <!-- Change UA-20914866-1 to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  <!-- Social Widget Rendering Javascript /-->
  <script src="http://platform.twitter.com/widgets.js"></script>
  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
  <script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>
  <!-- End Social Widget Rendering Javascript /-->
  @show
</body>
</html>
