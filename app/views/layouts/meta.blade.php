@section('header_meta')
<title>{{ $head->last('title') }}</title>
<meta name="description" content="{{ $head->last('description') }}" />
<meta name="keywords" content="{{ $head->last('keywords') }}" />
<meta name="author" content="humans.txt">

<!--Facebook Metadata /-->
<meta property="fb:page_id" content="" />
<meta property="og:image" content="http://fideloper.com/fideloper.jpg" />
<meta property="og:description" content="{{ $head->last('description') }}"/>
<meta property="og:title" content="{{ $head->last('title') }}"/>

<!--Google+ Metadata /-->
<meta itemprop="name" content="{{ $head->last('title') }}">
<meta itemprop="description" content="{{ $head->last('description') }}">
<meta itemprop="image" content="http://fideloper.com/fideloper.jpg">

<!-- Twitter Metadata /-->
<meta property="twitter:account_id" content="196841165" />
@stop