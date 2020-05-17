<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tags as $tag)
        <?php
        $explode = explode("،", $tag['gensgabeh']);
        ?>
        @foreach($explode as $data)
            <url>
                <loc>http://mycubic.ir/tags/{{ $data }}</loc>
                <lastmod>{{ date("Y-m-d H:i:s",strtotime("-7 days",time())) }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endforeach
</urlset>