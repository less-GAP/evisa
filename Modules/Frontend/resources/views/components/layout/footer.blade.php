<?php
$footerMenus = master_data('footer-menu')->toArray();
?>
<footer class="main-footer relative">
    <div class="footer-top lg:py-24 py-10 relative">
        <div class="footer-bg absolute z-10 w-full h-full top-0 left-0 overflow-hidden">
            <img src="/static/images/bg-footer.png" alt="eVisa"
                 class="absolute z-0 w-full h-full top-0 left-0 object-cover">
        </div>
        <div class="container px-4 mx-auto relative z-30">
            <div class="uppercase font-black xl:text-3xl md:text-2xl text-xl">Our LINK</div>
            <div class="flex px-4 flex-wrap -mx-4 mt-5 md:mt-10 xl:mt-14 text-lg xl:text-xl">
                <ul class="w-full grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 md:gap-4">
                    @foreach($footerMenus as $footerMenu)
                        <li><a href="{{$footerMenu['url']}}">{{$footerMenu['label']}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom lg:py-6 py-4 bg-black text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 lg:w-1/3 text-center md:text-left">
                    <a href="/">
                        <img src="/static/images/logo-eVisa.png" alt="eVisa"
                             class="max-w-[150px] brightness-0 invert inline-block">
                    </a>
                </div>
                <div
                    class="w-full md:w-1/2 lg:w-2/3 mt-5 md:mt-0 text-center md:text-right md:text-base text-[12px]">
                    <div class="">© e-VISA USA LLC. All Rights Reserved<br/>Website Design and Website Development
                        by less[GAP] Solutions
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
