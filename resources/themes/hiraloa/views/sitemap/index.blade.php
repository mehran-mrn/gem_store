<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?php
$tagTime = \Illuminate\Support\Carbon::createFromTimeString($tags['created_at']); ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://mycubic.ir/sitemap.xml/products</loc>
        <lastmod>{{$products['created_at']->tz('utc')->toAtomString()}}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://mycubic.ir/sitemap.xml/categories</loc>
        <lastmod>{{$categories['cat']['created_at']->tz('utc')->toAtomString()}}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://mycubic.ir/sitemap.xml/posts</loc>
        <lastmod>{{$posts['created_at']->tz('utc')->toAtomString()}}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://mycubic.ir/sitemap.xml/tags</loc>
        <lastmod>{{$tagTime->tz('utc')->toAtomString()}}</lastmod>
    </sitemap>
</sitemapindex>
