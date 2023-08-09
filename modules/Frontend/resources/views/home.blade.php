@extends("Frontend::layout.index")
@section('content')
    @if(!empty($packages))
        @foreach($packages as $package)
            <section id="section-package-{{$package['id']}}" class="product_packages" style="background: {{$package['background']}}">
                <div class="container relative py-12 lg:py-16">
                    <div class="items-center row">
                        <div class="w-full col md:w-1/2">
                            <div class="package-course" id="package-{{$package['id']}}">
                                <div class="package-course-img">
                                    <div class="swiper-package">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                @foreach($package['courses'] as $key => $cur)
                                                    <div class="swiper-slide">
                                                        <a href="{{url('product/'.$package['slug'])}}" title="Detox">
                                                            <img
                                                                class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"
                                                                src="{{$cur['image_url']}}" alt="Detox">
                                                        </a>
                                                        <p class="product-package-price mt-2 md:mt-4 text-center">{{$cur['name']}}: {{number_format($cur['price'], -3,',','.')}}
                                                            <span style="text-transform: none">đ</span></p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center package-course-control mt-5">
                                    <div class="text-sm font-medium">On Course:</div>
                                    @foreach($package['courses'] as $key => $cur)
                                        @if($key == 0)
                                            <div class="text-sm font-semibold ml-5">{{$cur['time']}}</div>
                                        @endif
                                        @if($key > 0)
                                            <div
                                                class="flex items-center px-1 mx-3 rounded-full w-14 h-7 btn-handleToggle cursor-pointer active"
                                                data-current="4" id="handleToggle-{{$package['id']}}">
                                                <div class="w-5 h-5 transform bg-white rounded-full shadow-md node"></div>
                                            </div>
                                            <div class="text-sm font-semibold">{{$cur['time']}}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-5 col md:w-1/2 md:order-first md:mt-0">
                            <div class="box info-product relative max-w-[460px] mx-auto px-5 md:px-8 py-4 md:py-12">
                                <div class="relative z-10 inner">
                                    <h4 class="mb-2 product-package-name font-title">
                                        <a href="{{url('product/'.$package['slug'])}}"
                                           title="Detox">{{$package['name']}}
                                        </a>
                                    </h4>
                                    <p class="mb-3 product-package-description md:mb-6">{{$package['short_description']}}</p>
                                    <a href="{{url('product/'.$package['slug'])}}" title="Detox" class="btn">xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute hidden translate-x-1/2 -translate-y-1/2 pointer-events-none model right-full top-1/2 w-max xl:block"
                        id="model-1">
                        <img src="{{$package['image_url']}}" alt="{{$package['name']}}">
                    </div>
                </div>
                <script>
                    window.document.addEventListener('DOMContentLoaded', () => {
                        if (document.getElementById('package-{{$package['id']}}')) {
                            var swiper_{{$package['id']}} = new Swiper('#package-{{$package['id']}} .swiper', {
                                slidesPerView: 1,
                                spaceBetween: 30,
                                loop: true,
                                simulateTouch: false,
                            });
                            let btn_{{$package['id']}} = document.getElementById('handleToggle-{{$package['id']}}');
                            btn_{{$package['id']}}.addEventListener('click', () => {
                                let current_{{$package['id']}} = btn_{{$package['id']}}.getAttribute('data-current');
                                if (current_{{$package['id']}} == 7) {
                                    btn_{{$package['id']}}.setAttribute('data-current', 4);
                                    btn_{{$package['id']}}.classList.add('active');
                                    swiper_{{$package['id']}}.slideTo(0);
                                } else {
                                    btn_{{$package['id']}}.setAttribute('data-current', 7);
                                    btn_{{$package['id']}}.classList.remove('active');
                                    swiper_{{$package['id']}}.slideTo(1);
                                }
                            });
                        }
                    });
                </script>
            </section>
        @endforeach
    @endif
    {{--    <section id="section-package-74747" class="product_packages"--}}
    {{--             style="background: radial-gradient(106.09% 106.09% at 70.27% 50%, #F2CEAC 0%, #E7B078 49.3%)">--}}
    {{--        <div class="container relative py-12 lg:py-16">--}}
    {{--            <div class="items-center row">--}}
    {{--                <div class="w-full col md:w-1/2">--}}
    {{--                    <div class="package-course" id="package-74747">--}}
    {{--                        <div class="package-course-img">--}}
    {{--                            <div class="swiper-package">--}}
    {{--                                <div class="swiper">--}}
    {{--                                    <div class="swiper-wrapper">--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/recovery-package/" title="Recovery">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/4-months/recovery.png" alt="Recovery">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Intense:--}}
    {{--                                                $180.00</p>--}}
    {{--                                            <p class="text-center">/month on 1 month-use</p>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/recovery-package/" title="Recovery">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/7-months/recovery.png" alt="Recovery">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Basic: $122.50</p>--}}
    {{--                                            <p class="text-center">/month on 2 months-use</p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="flex items-center justify-center package-course-control mt-5">--}}
    {{--                            <div class="text-sm font-medium">On Course:</div>--}}
    {{--                            <div class="text-sm font-semibold ml-5">4 months</div>--}}
    {{--                            <div--}}
    {{--                                class="flex items-center px-1 mx-3 rounded-full w-14 h-7 btn-handleToggle cursor-pointer active"--}}
    {{--                                data-href="" data-current="4" id="handleToggle-74747">--}}
    {{--                                <div class="w-5 h-5 transform bg-white rounded-full shadow-md node"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-sm font-semibold">7 months</div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="w-full mt-5 col md:w-1/2 md:mt-0">--}}
    {{--                    <div class="box info-product relative max-w-[460px] mx-auto px-5 md:px-8 py-4 md:py-12">--}}
    {{--                        <div class="relative z-10 inner">--}}
    {{--                            <h4 class="mb-2 product-package-name font-title">Recovery Package</h4>--}}
    {{--                            <p class="mb-3 product-package-description md:mb-6">A functional dietary package to support--}}
    {{--                                recovery and regeneration after exhausting exercise or exercise.</p>--}}
    {{--                            <a href="/product/recovery-package/" class="btn">View more</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="absolute hidden -translate-x-1/2 -translate-y-1/2 pointer-events-none model left-full top-1/2 w-max xl:block"--}}
    {{--                id="model-2">--}}
    {{--                <img src="/data/img/product/package-2/model.png?ver=1" alt="Recovery Package">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <script>--}}
    {{--            window.document.addEventListener('DOMContentLoaded', () => {--}}
    {{--                if (document.getElementById('package-74747')) {--}}
    {{--                    var swiper_74747 = new Swiper('#package-74747 .swiper', {--}}
    {{--                        slidesPerView: 1,--}}
    {{--                        spaceBetween: 30,--}}
    {{--                        loop: true,--}}
    {{--                        simulateTouch: false,--}}
    {{--                    });--}}
    {{--                    let btn_74747 = document.getElementById('handleToggle-74747');--}}
    {{--                    btn_74747.addEventListener('click', () => {--}}
    {{--                        let current_74747 = btn_74747.getAttribute('data-current');--}}
    {{--                        if (current_74747 == 7) {--}}
    {{--                            btn_74747.setAttribute('data-current', 4);--}}
    {{--                            btn_74747.classList.add('active');--}}
    {{--                            swiper_74747.slideTo(0);--}}
    {{--                        } else {--}}
    {{--                            btn_74747.setAttribute('data-current', 7);--}}
    {{--                            btn_74747.classList.remove('active');--}}
    {{--                            swiper_74747.slideTo(1);--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                }--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    </section>--}}
    {{--    <section id="section-package-4417" class="product_packages"--}}
    {{--             style="background: radial-gradient(61.38% 61.38% at 68.6% 50.21%, #bb653d 0%, #e76519 100%)">--}}
    {{--        <div class="container relative py-12 lg:py-16">--}}
    {{--            <div class="items-center row">--}}
    {{--                <div class="w-full col md:w-1/2">--}}
    {{--                    <div class="package-course text-white" id="package-4417">--}}
    {{--                        <div class="package-course-img">--}}
    {{--                            <div class="swiper-package">--}}
    {{--                                <div class="swiper">--}}
    {{--                                    <div class="swiper-wrapper">--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/transformation-package/" title="Transformation">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/4-months/transformation.png"--}}
    {{--                                                    alt="Transformation">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Intense: $347</p>--}}
    {{--                                            <p class="text-center">/month on 1 month-use</p>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/transformation-package/" title="Transformation">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/7-months/transformation.png"--}}
    {{--                                                    alt="Transformation">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Basic: $285</p>--}}
    {{--                                            <p class="text-center">/month on 2 months-use</p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="flex items-center justify-center package-course-control mt-5">--}}
    {{--                            <div class="text-sm font-medium">On Course:</div>--}}
    {{--                            <div class="text-sm font-semibold ml-5">4 months</div>--}}
    {{--                            <div--}}
    {{--                                class="flex items-center px-1 mx-3 rounded-full w-14 h-7 btn-handleToggle cursor-pointer active"--}}
    {{--                                data-href="" data-current="4" id="handleToggle-4417">--}}
    {{--                                <div class="w-5 h-5 transform bg-white rounded-full shadow-md node"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-sm font-semibold">7 months</div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="w-full mt-5 md:order-first col md:w-1/2 md:mt-0">--}}
    {{--                    <div class="box info-product relative max-w-[460px] mx-auto px-5 md:px-8 py-4 md:py-12">--}}
    {{--                        <div class="relative z-10 inner">--}}
    {{--                            <h4 class="mb-2 product-package-name font-title">Transformation Package</h4>--}}
    {{--                            <p class="mb-3 product-package-description md:mb-6">provides low calorie, high fiber and--}}
    {{--                                nutrient rich foods that help burn fat, boost metabolism and support effective weight--}}
    {{--                                loss.</p>--}}
    {{--                            <a href="/product/transformation-package/" class="btn">View more</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="absolute hidden translate-x-1/2 -translate-y-1/2 pointer-events-none model right-full top-1/2 w-max xl:block"--}}
    {{--                id="model-2">--}}
    {{--                <img src="/data/img/product/package-3/model.png?ver=1" alt="Transformation Package - Model">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <script>--}}
    {{--            window.document.addEventListener('DOMContentLoaded', () => {--}}
    {{--                if (document.getElementById('package-4417')) {--}}
    {{--                    var swiper_4417 = new Swiper('#package-4417 .swiper', {--}}
    {{--                        slidesPerView: 1,--}}
    {{--                        spaceBetween: 30,--}}
    {{--                        loop: true,--}}
    {{--                        simulateTouch: false,--}}
    {{--                    });--}}
    {{--                    let btn_4417 = document.getElementById('handleToggle-4417');--}}
    {{--                    btn_4417.addEventListener('click', () => {--}}
    {{--                        let current_4417 = btn_4417.getAttribute('data-current');--}}
    {{--                        if (current_4417 == 7) {--}}
    {{--                            btn_4417.setAttribute('data-current', 4);--}}
    {{--                            btn_4417.classList.add('active');--}}
    {{--                            swiper_4417.slideTo(0);--}}
    {{--                        } else {--}}
    {{--                            btn_4417.setAttribute('data-current', 7);--}}
    {{--                            btn_4417.classList.remove('active');--}}
    {{--                            swiper_4417.slideTo(1);--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                }--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    </section>--}}
    {{--    <section id="section-package-79531" class="product_packages"--}}
    {{--             style="background: radial-gradient(61.38% 61.38% at 68.6% 50.21%, #886DB1 0%, #735A9A 100%)">--}}
    {{--        <div class="container relative py-12 lg:py-16">--}}
    {{--            <div class="items-center row">--}}
    {{--                <div class="w-full col md:w-1/2">--}}
    {{--                    <div class="package-course text-white" id="package-79531">--}}
    {{--                        <div class="package-course-img">--}}
    {{--                            <div class="swiper-package">--}}
    {{--                                <div class="swiper">--}}
    {{--                                    <div class="swiper-wrapper">--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/revitalization-package" title="Revitalization">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/4-months/revitalization-men.png"--}}
    {{--                                                    alt="Revitalization">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Intense:--}}
    {{--                                                $319.50</p>--}}
    {{--                                            <p class="text-center">/month on 1 month-use</p>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="swiper-slide">--}}
    {{--                                            <a href="/product/revitalization-package" title="Revitalization">--}}
    {{--                                                <img--}}
    {{--                                                    class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto"--}}
    {{--                                                    src="/data/img/product/7-months/revitalization-men.png"--}}
    {{--                                                    alt="Revitalization">--}}
    {{--                                            </a>--}}
    {{--                                            <p class="product-package-price mt-2 md:mt-4 text-center">Basic: $265</p>--}}
    {{--                                            <p class="text-center">/month on 2 months-use</p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="flex items-center justify-center package-course-control mt-5">--}}
    {{--                            <div class="text-sm font-medium">On Course:</div>--}}
    {{--                            <div class="text-sm font-semibold ml-5">4 months</div>--}}
    {{--                            <div--}}
    {{--                                class="flex items-center px-1 mx-3 rounded-full w-14 h-7 btn-handleToggle cursor-pointer active"--}}
    {{--                                data-href="" data-current="4" id="handleToggle-79531">--}}
    {{--                                <div class="w-5 h-5 transform bg-white rounded-full shadow-md node"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-sm font-semibold">7 months</div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="w-full mt-5 col md:w-1/2 md:mt-0">--}}
    {{--                    <div class="box info-product relative max-w-[460px] mx-auto px-5 md:px-8 py-4 md:py-12">--}}
    {{--                        <div class="relative z-10 inner">--}}
    {{--                            <h4 class="mb-2 product-package-name font-title">Revitalization Package</h4>--}}
    {{--                            <p class="mb-3 product-package-description md:mb-6">This pack provides foods rich in--}}
    {{--                                antioxidants, vitamins and minerals that help provide energy, promote health and--}}
    {{--                                rejuvenate the body.</p>--}}
    {{--                            <a href="/product/revitalization-package" class="btn">View more</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div--}}
    {{--                class="absolute hidden -translate-x-1/2 -translate-y-1/2 pointer-events-none model left-full top-1/2 w-max xl:block"--}}
    {{--                id="model-2">--}}
    {{--                <img src="/data/img/product/package-2/model.png?ver=1" alt="Revitalization Package">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <script>--}}
    {{--            window.document.addEventListener('DOMContentLoaded', () => {--}}
    {{--                if (document.getElementById('package-79531')) {--}}
    {{--                    var swiper_79531 = new Swiper('#package-79531 .swiper', {--}}
    {{--                        slidesPerView: 1,--}}
    {{--                        spaceBetween: 30,--}}
    {{--                        loop: true,--}}
    {{--                        simulateTouch: false,--}}
    {{--                    });--}}
    {{--                    let btn_79531 = document.getElementById('handleToggle-79531');--}}
    {{--                    btn_79531.addEventListener('click', () => {--}}
    {{--                        let current_79531 = btn_79531.getAttribute('data-current');--}}
    {{--                        if (current_79531 == 7) {--}}
    {{--                            btn_79531.setAttribute('data-current', 4);--}}
    {{--                            btn_79531.classList.add('active');--}}
    {{--                            swiper_79531.slideTo(0);--}}
    {{--                        } else {--}}
    {{--                            btn_79531.setAttribute('data-current', 7);--}}
    {{--                            btn_79531.classList.remove('active');--}}
    {{--                            swiper_79531.slideTo(1);--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                }--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    </section>--}}
@endsection
