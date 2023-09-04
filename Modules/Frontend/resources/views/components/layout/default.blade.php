<x-splade-flash>
    <p v-if="flash.has('message')" v-text="flash.message" />
</x-splade-flash>
<x-Frontend::layout.header>
</x-Frontend::layout.header>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            {{ $slot }}

        </main><!-- #main -->
    </div><!-- #primary -->

<x-Frontend::layout.footer>
</x-Frontend::layout.footer>
