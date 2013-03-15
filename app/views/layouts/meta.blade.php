<title>{{ $head->first('title') }}</title>
<meta name="description" content="{{ $head->first('description') }}" />
<meta name="keywords" content="{{ $head->first('keywords') }}" />
<meta name="author" content="humans.txt">

<!--Facebook Metadata /-->
<meta property="fb:page_id" content="" />
<meta property="og:image" content="http://fideloper.com/fideloper.jpg" />
<meta property="og:description" content="{{ $head->first('description') }}"/>
<meta property="og:title" content="{{ $head->first('title') }}"/>

<!--Google+ Metadata /-->
<meta itemprop="name" content="{{ $head->first('title') }}">
<meta itemprop="description" content="{{ $head->first('description') }}">
<meta itemprop="image" content="http://fideloper.com/fideloper.jpg">
