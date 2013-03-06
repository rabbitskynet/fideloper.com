
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Performant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">

  </head>

  <body class="{{ $body_class }}">
  	@if ( isset( $nav ) )
      {{ $nav }}
    @endif

  	{{ $content }}

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>

  </body>
</html>