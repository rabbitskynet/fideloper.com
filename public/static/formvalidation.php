<?php print_r($_POST); ?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Gumby - A Responsive 960 Grid CSS Framework</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="humans.txt">

  <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

  <!--Facebook Metadata /-->
  <meta property="fb:page_id" content="" />
  <meta property="og:image" content="" />
  <meta property="og:description" content=""/>
  <meta property="og:title" content=""/>

  <!--Google+ Metadata /-->
  <meta itemprop="name" content="">
  <meta itemprop="description" content="">
  <meta itemprop="image" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <!-- <link rel="stylesheet" href="css/minified.css"> -->

  <!-- CSS imports non-minified for staging, minify before moving to production-->
  <link rel="stylesheet" href="css/gumby.css">
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div class="container">
    <section class="row">
      <h2 class="row">Form Validation Example</h2>
      <form class="row validation-example" method="POST" action="">
        <ul class="eight columns">
          <li class="field"><input class="text input" name="field-1" type="text" placeholder="Text input" /></li>
          <li class="field"><input class="email input" name="field-2" type="email" placeholder="Email input" /></li>
          <li class="field"><input class="password input" name="field-3" type="password" placeholder="Password input" /></li>
          <li class="field"><input class="phone input"  name="field-4" type="tel" placeholder="Telephone Number" /></li>
          <li class="field"><input class="numeric input" name="field-5" type="number" placeholder="Numeric input" /></li>
          <li class="field"><input class="search input" name="field-6" type="search" placeholder="Search input" /></li>
          <li class="field"><textarea class="input textarea" name="field-7" placeholder="Textarea" rows="3"></textarea></li>
          <li class="prepend field">
            <span class="adjoined">@</span>
            <input class="xwide text input" name="field-8" type="text" placeholder="Text input" />
          </li>
          <li class="append field">
            <input class="xwide email input" name="field-9" type="email" placeholder="Email input" />
            <span class="adjoined">@</span>
          </li>
          <li class="prepend append field">
            <span class="adjoined">$</span>
            <input class="wide text input" name="field-10" type="text" placeholder="Text input" />
            <span class="adjoined">.00</span>
          </li>
          <li class="prepend field">
            <div class="medium primary btn"><a href="#">Go</a></div>
            <input class="wide text input" name="field-11" type="text" placeholder="Text input" />
          </li>
          <li class="append field">
            <input class="wide email input" name="field-12" type="email" placeholder="Email input" />
            <div class="medium primary btn"><a href="#">Go</a></div>
          </li>
          <li class="prepend append field">
            <span class="adjoined">$</span>
            <input class="normal text input" name="field-13" type="text" placeholder="Text input" />
            <div class="medium primary btn"><a href="#">Go</a></div>
          </li>
          <li class="prepend append double field">
            <input class="text input" type="text" placeholder="Text input" />
            <input class="password input" name="field-14" type="password" placeholder="Password input" />
          </li>
          <li class="field">
            <div class="picker">
              <select name="field-15">
                <option value="#">Favorite Dalek phrase...</option>
                <option>EXTERMINATE</option>
                <option>EXTERMINATE</option>
                <option value="correct">EXTERMINATE</option>
                <option>EXTERMINATE</option>
                <option>EXTERMINATE</option>
                <option>EXTERMINATE</option>
                <option>EXTERMINATE</option>
                <option>EXTERMINATE</option>
              </select>
            </div>
          </li>
        <li class="field">
            <label class="radio" for="radio1">
              <input name="field-16[]" value="1" type="radio">
              <span></span> Radio Button 1
            </label>
            <label class="radio" for="radio2">
              <input name="field-16[]" value="2" type="radio" id="radio2">
              <span></span> Radio Button 2
            </label>
            <label class="radio" for="radio3">
              <input name="field-16[]" value="3" type="radio" id="radio3">
              <span></span> Radio Button 3
            </label>
          </li>
          <li class="field">
            <label class="checkbox" for="checkbox1">
              <input name="field-17" value="agreed" type="checkbox" id="checkbox1">
              <span></span> Checkbox 1
            </label>
          </li>
          <div class="medium primary btn"><input type="submit" value="Submit" /></div>
          <div class="medium primary btn danger pretty"><input type="submit" value="Submit" /></div>
          <div class="medium secondary btn"><button>Button</button></div>
          <div class="medium primary btn pretty"><button>Button</button></div>
          <div class="medium primary btn"><a href="">Link</a></div>
          <div class="medium primary btn pretty"><a href="">Link</a></div>
        </ul>
      </form>
    </section>
  </div>

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

  <script src="js/libs/gumby.js"></script>
  <script src="js/libs/ui/gumby.toggleswitch.js"></script>
  <script src="js/libs/ui/gumby.checkbox.js"></script>
  <script src="js/libs/ui/gumby.radiobtn.js"></script>
  <script src="js/libs/ui/gumby.tabs.js"></script>
  <script src="js/libs/ui/jquery.validation.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <!-- end scripts-->


  <!-- Change UA-XXXXX-X to be your site's ID -->
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
</body>
</html>
