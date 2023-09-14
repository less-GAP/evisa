<?php

use App\Models\Post;
use ProtoneMedia\Splade\Facades\SEO;

SEO::title('Visa News')
    ->description($page->excerpt ?? '')
    ->keywords($page->keywords ?? '');
SEO::openGraphType('WebPage');
SEO::openGraphSiteName(settings('site_title',''));
SEO::openGraphTitle('Visa News');
SEO::openGraphUrl(url('news'));

?>

<x-Frontend::layout.default>
    {!! $content !!}
</x-Frontend::layout.default>



