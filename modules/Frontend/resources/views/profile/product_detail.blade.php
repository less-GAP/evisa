@extends("Frontend::layout.index")
@section('content')
    <div class="grid grid-cols-4 max-w-screen-xl xl:mx-auto xl:grid-cols-4 gap-4 py-4">
        <div>
            @include("Frontend::profile.sidebar")
        </div>
        <div class="bg-white col-span-3 border-[1px] p-5">
            @if(!empty($product))
                <x-splade-form action="{{route('profile.product.cart')}}" method="POST" :default="$form">
                    <input type="hidden" name="product_id" v-model="form.product_id">
                    <input type="hidden" name="package_course_id" v-model="form.package_course_id">
                    <input type="hidden" name="price" v-model="form.price">
                    <input type="hidden" name="amount" v-model="form.amount">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 xl:gap-x-8">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7" style="min-height: 235px;display: flex; align-items: center;">
                            <img src="{{$product['image_url']}}" alt="{{$product['products']['name'].' '.$product['name'].' '.$product['time']}}"
                                 class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div>
                            <h2 class="text-2xl font-extrabold dark:text-white">{{$product['products']['name']}}</h2>
                            <h3 class="text-gray-400 text-lg"> {{$product['name']}}: {{$product['time']}}</h3>
                            <div class="mt-2 text-2xl">
                                <p>
                                    {{number_format($product['price'],-3,',','.')}}<span style="text-transform: none">đ</span>
                                </p>
                            </div>
                            <p class="text-md text-gray-600 py-2 mb-5 text-left">
                                {{$product['short_description']}}
                            </p>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-x-5 gap-y-10 xl:gap-x-4">
                        <div class="relative py-12 lg:py-16 2xl:py-20 package_includes">
                            <div id="product-nav-{{$customer_info['id']}}" class="product-nav">
                                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper !h-auto" id="swiper-wrapper" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(335.143px, 0px, 0px);">
                                        @foreach($product['pros'] as $k => $pro)
                                            <div class="swiper-slide @if($k == 0) swiper-slide-active @endif" role="group" aria-label="{{$k+1}} / {{count($product['products'])}}" style="width: 163.429px; margin-right: 60px;">
                                                <div class="product-include">
                                                    <a data-target="#product-{{$customer_info['id']}}-{{$product['id']}}{{$k+1}}" @if($k == 0) class="active" @endif>
                                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">
                                                            <img src="{{$pro['image_url']}}" alt="{{$pro['name']}}">
                                                        </div>
                                                        <div class="w-full mt-4 text-center lg:mt-6 name">{{$product['name']}} - {{$pro['name']}}</div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            </div>
                            <div id="product-tab-{{$customer_info['id']}}" class="mt-10 text-xl product-info md:text-xl product-tab">
                                @foreach($product['pros'] as $k => $pro)
                                    <div class="tab @if($k == 0) active @endif" id="product-{{$customer_info['id']}}-{{$product['id']}}{{$k+1}}">
                                        <div class="items-center row">
                                            <div class="w-full col md:w-1/2">
                                                <div class="product-detail xl:pr-10 text-sm" style="color: #666666;">
                                                    {!! $pro['description'] !!}
                                                </div>
                                            </div>
                                            <div class="w-full mt-5 mt:md-0 col md:w-1/2">
                                                <img src="{{$pro['image_url']}}" class="xl:rounded-[40px] rounded-2xl" alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </x-splade-form>
            @endif
        </div>
        <x-splade-script>
            if (document.getElementById('product-nav-{{$customer_info['id']}}')) {
            const swiper = new Swiper('#product-nav-{{$customer_info['id']}} .swiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            centerInsufficientSlides: true,
            // loop: true,
            pagination: {
            el: '#product-nav-{{$customer_info['id']}} .swiper-pagination',
            clickable: true,
            },
            navigation: {
            nextEl: '#product-nav-{{$customer_info['id']}} .swiper-button-next',
            prevEl: '#product-nav-{{$customer_info['id']}} .swiper-button-prev',
            },
            breakpoints: {
            640: {
            slidesPerView: 3,
            spaceBetween: 20,
            },
            768: {
            slidesPerView: 3,
            spaceBetween: 40,
            },
            1024: {
            slidesPerView: 4,
            spaceBetween: 50,
            },
            1400: {
            slidesPerView: 5,
            spaceBetween: 60,
            },
            }
            });
            }

            var product_nav = document.getElementById('product-nav-{{$customer_info['id']}}');
            var product_nav_items = document.querySelectorAll('#product-nav-{{$customer_info['id']}} a');
            var product_tab = document.getElementById('product-tab-{{$customer_info['id']}}');
            var product_tab_items = document.querySelectorAll('#product-tab-{{$customer_info['id']}} .tab');

            if (product_nav && product_tab) {
            product_nav_items.forEach(function (item) {
            item.addEventListener('click', function (e) {
            e.preventDefault();
            if (this.classList.contains('active')) {
            return;
            }

            var target = this.getAttribute('data-target');
            product_tab_items.forEach(function (tab) {
            tab.classList.remove('active');
            });
            product_nav_items.forEach(function (nav) {
            nav.classList.remove('active');
            });
            this.classList.add('active');
            document.querySelector(target).classList.add('active');
            });
            });
            }
        </x-splade-script>
@endsection

