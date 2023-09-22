<?php

use App\Models\Post;
use ProtoneMedia\Splade\Facades\SEO;

$page = Post::where('slug', request()->route('slug'))->first();
if (!$page) {
    echo view('front::not-found');
    return;
}

$content = \Blade::render($page->content);
?>
<x-front::layout.sidebar>
    @seoTitle($page->title)
    @seoDescription($page->excerpt ?? '')
    @seoKeywords($page->excerpt ?? '')
    @seoOpenGraphImage(url($page->image))
    <h1 class="text-center mb-5 text-neutral-900 text-left font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl "
        title="{{$page->title}}">{{$page->title}}</h1>
    <span class="block text-base text-neutral-500 md:text-lg dark:text-neutral-400 pb-1">{{$page->excerpt}}</span>
    <div id="page-content" class="prose w-full lg:prose-lg mx-auto dark:prose-invert">
        {!! $content !!}
    </div>
</x-front::layout.sidebar>

