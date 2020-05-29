<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tags as $tag)
        <?php
        $explode = explode("،", $tag['gensgabeh']);
        $date = \Illuminate\Support\Carbon::createFromTimeString($tag['created_at']);
        ?>
        @foreach($explode as $data)
            <url>
                <loc>https://mycubic.ir/tags/{{ $data }}</loc>
                <lastmod>{{ $date->tz('utc')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endforeach
</urlset>