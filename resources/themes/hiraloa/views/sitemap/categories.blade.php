<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categories as $article)
        <url>
            <loc>http://mycubic.ir/categories/{{ $article->slug }}</loc>
            <lastmod>{{ date("Y-m-d H:i:s",strtotime("-7 days",time())) }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>