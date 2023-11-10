<x-front::layout.header>
</x-front::layout.header>

<x-splade-flash>
    <p v-if="flash.has('message')" v-text="flash.message"/>
</x-splade-flash>
<div id="primary" class="content-area bg-white">
    <main id="main" class="site-main">

        {{ $slot }}

    </main><!-- #main -->
</div><!-- #primary -->

<x-front::layout.footer>
</x-front::layout.footer>
