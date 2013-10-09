@section('scripts')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

  @if( App::environment() === 'production' )
  <script src="/static/js/app.min.js"></script>
  @else
  <script src="/static/bower_components/gumby/js/libs/gumby.min.js"></script>
  <script src="/static/bower_components/gumby/js/plugins.js"></script>
  <script src="/static/bower_components/gumby/js/main.js"></script>
  @endif
  <!-- end scripts-->

  <script src="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function()
      {
          $('.post pre, table code').addClass('prettyprint');
          prettyPrint();
      });
  </script>

  <script>
    window._gaq = [['_setAccount','{{ $gacode }}'],['_trackPageview'],['_trackPageLoadTime']];
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
  <?php /* Don't need these yet
  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
  <script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>
  */ ?>
  <!-- End Social Widget Rendering Javascript /-->
  @stop