<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url><loc>http://fideloper.com/</loc><changefreq>hourly</changefreq><lastmod>{{ $latest->updated_at }}</lastmod></url>
@foreach( $articles as $article )
<url><loc>http://fideloper.com/{{ $article->url_title }}</loc><lastmod>{{ date('c', strtotime($article->updated_at)) }}</lastmod></url>
@endforeach
</urlset>