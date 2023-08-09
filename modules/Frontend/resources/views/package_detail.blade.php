@extends("Frontend::layout.index")
<div class="main" id="site-main">
    @if(!empty($package))
        <section id="section-package-{{$package['id']}}" class="product_packages" style="background: {{$package['background']}}">
            <div class="container relative py-12 lg:py-16">
                <div class="items-center row">
                    <div class="w-full col md:w-1/2">
                        <div class="package-course" id="package-{{$package['id']}}">
                            <div class="package-course-img">
                                <div class="swiper-package">
                                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                                        <div class="swiper-wrapper" id="swiper-wrapper-b95a123555c8bc15" aria-live="polite">
                                            @if(!empty($package['courses']))
                                                @foreach($package['courses'] as $k => $cur)
                                                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2" data-swiper-slide-index="0" style="width: 736px; margin-right: 30px;">
                                                        <a href="#" title="{{$cur['name']}}">
                                                            <img class="block h-[300px] w-[300px] object-contain mx-auto xl:h-[600px] xl:w-auto" src="{{$cur['image_url']}}" alt="{{$cur['name']}}">
                                                        </a>
                                                        <p class="product-package-price mt-2 md:mt-4 text-center">{{$cur['name']}}: {{number_format($cur['price'],-3,',','.')}}<span style="text-transform: none">đ</span></p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                </div>
                            </div>
                            @if(!empty($package['courses']))
                                <div class="flex items-center justify-center package-course-control mt-5">
                                    @foreach($package['courses'] as $key => $cur)
                                        @if($key == 0)
                                            <div class="text-sm font-semibold ml-5">{{$cur['time']}}</div>
                                        @endif
                                        @if($key > 0)
                                            <div
                                                class="flex items-center px-1 mx-3 rounded-full w-14 h-7 btn-handleToggle cursor-pointer active" data-current="4" id="handleToggle-{{$package['id']}}">
                                                <div class="w-5 h-5 transform bg-white rounded-full shadow-md node"></div>
                                            </div>
                                            <div class="text-sm font-semibold">{{$cur['time']}}</div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="w-full mt-5 col md:w-1/2 md:order-first md:mt-0">
                        <div class="box info-product relative max-w-[460px] mx-auto px-5 md:px-8 py-4 md:py-12">
                            <div class="relative z-10 inner">
                                <h4 class="mb-2 product-package-name font-title">
                                    <a href="#" title="{{$package['name']}}">{{$package['name']}}</a>
                                </h4>
                                <p class="mb-3 product-package-description md:mb-6">{{$package['short_description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute hidden translate-x-1/2 -translate-y-1/2 pointer-events-none model right-full top-1/2 w-max xl:block" id="model-1">
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
                                document.getElementById('package-includes-0').classList.remove('hidden');
                                document.getElementById('package-includes-1').classList.add('hidden');
                            } else {
                                btn_{{$package['id']}}.setAttribute('data-current', 7);
                                btn_{{$package['id']}}.classList.remove('active');
                                swiper_{{$package['id']}}.slideTo(1);
                                document.getElementById('package-includes-0').classList.add('hidden');
                                document.getElementById('package-includes-1').classList.remove('hidden');
                            }
                        });
                    }
                });
            </script>
        </section>
        @if(!empty($package['courses']))
            @foreach($package['courses'] as $key => $cur)
                <section id="package-includes-{{$key}}" class="package_includes @if($key > 0) hidden @endif">
                    <div class="container relative py-12 lg:py-16 2xl:py-20">
                        @if(!empty($cur['products']))
                            <div id="product-nav-{{$key}}" class="product-nav">
                                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper !h-auto" id="swiper-wrapper-00d1ff3d47b1ee6a" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(335.143px, 0px, 0px);">
                                        @foreach($cur['products'] as $k => $pro)
                                            <div class="swiper-slide @if($k == 0) swiper-slide-active @endif" role="group" aria-label="{{$k+1}} / {{count($cur['products'])}}" style="width: 163.429px; margin-right: 60px;">
                                                <div class="product-include">
                                                    <a data-target="#product-{{$cur['id']}}{{$k+1}}" @if($k == 0) class="active" @endif>
                                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">
                                                            <img src="{{$pro['image_url']}}" alt="{{$pro['name']}}">
                                                        </div>
                                                        <div class="w-full mt-4 text-center lg:mt-6 name">{{$cur['name']}} - {{$pro['name']}}</div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            </div>
                            <div id="product-tab-{{$key}}" class="mt-16 text-sm product-info md:text-xl product-tab">
                                @foreach($cur['products'] as $k => $pro)
                                    <div class="tab @if($k == 0) active @endif" id="product-{{$cur['id']}}{{$k+1}}">
                                        <div class="items-center row">
                                            <div class="w-full col md:w-1/2">
                                                <h4 class="uppercase text-2xl xl:text-[45px] font-bold mb-6 font-title">
                                                    <a>{{$pro['name']}}</a>
                                                </h4>
                                                <div class="product-detail xl:pr-10" style="color: #666666;">
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
                        @endif
                    </div>
                </section>
                <script>
                    window.document.addEventListener('DOMContentLoaded', () => {
                        if (document.getElementById('product-nav-{{$key}}')) {
                            const swiper2 = new Swiper('#product-nav-{{$key}} .swiper', {
                                slidesPerView: 2,
                                spaceBetween: 30,
                                centerInsufficientSlides: true,
                                // loop: true,
                                pagination: {
                                    el: '#product-nav-{{$key}} .swiper-pagination',
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: '#product-nav .swiper-button-next',
                                    prevEl: '#product-nav .swiper-button-prev',
                                },
                                breakpoints: {
                                    640: {
                                        slidesPerView: 3,
                                        spaceBetween: 20,
                                    },
                                    768: {
                                        slidesPerView: 4,
                                        spaceBetween: 40,
                                    },
                                    1024: {
                                        slidesPerView: 5,
                                        spaceBetween: 50,
                                    },
                                    1400: {
                                        slidesPerView: 7,
                                        spaceBetween: 60,
                                    },
                                }
                            });
                        }

                        var product_nav = document.getElementById('product-nav-{{$key}}');
                        var product_nav_items = document.querySelectorAll('#product-nav-{{$key}} a');
                        var product_tab = document.getElementById('product-tab-{{$key}}');
                        var product_tab_items = document.querySelectorAll('#product-tab-{{$key}} .tab');

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

                    });
                </script>
            @endforeach
        @endif
    @endif


    {{--        <section id="package-includes" class="package_includes">--}}
    {{--            <div class="container relative py-12 lg:py-16 2xl:py-20">--}}
    {{--                <div id="product-nav" class="">--}}
    {{--                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">--}}
    {{--                        <div class="swiper-wrapper !h-auto" id="swiper-wrapper-00d1ff3d47b1ee6a" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(335.143px, 0px, 0px);">--}}
    {{--                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 163.429px; margin-right: 60px;">--}}
    {{--                                <div class="product-include">--}}
    {{--                                    <a data-target="#product-1" class="active">--}}
    {{--                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">--}}
    {{--                                            <img src="/data/img/product/package-1/q-detox-herbal-tea.jpeg" alt="Q DAILY DETOX Herbal Tea">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="w-full mt-4 text-center lg:mt-6 name">Q DAILY DETOX Herbal Tea</div>--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4" style="width: 163.429px; margin-right: 60px;">--}}
    {{--                                <div class="product-include">--}}
    {{--                                    <a data-target="#product-2" class=" ">--}}
    {{--                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">--}}
    {{--                                            <img src="/data/img/product/package-1/q-ultra-greens.jpeg" alt="Q ULTRA GREENS">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="w-full mt-4 text-center lg:mt-6 name">Q ULTRA GREENS</div>--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="swiper-slide" role="group" aria-label="3 / 4" style="width: 163.429px; margin-right: 60px;">--}}
    {{--                                <div class="product-include">--}}
    {{--                                    <a data-target="#product-3" class="">--}}
    {{--                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">--}}
    {{--                                            <img src="/data/img/product/package-1/q-sleep-spray.jpeg" alt="Q SLEEP Spray">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="w-full mt-4 text-center lg:mt-6 name">Q SLEEP Spray</div>--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="swiper-slide" role="group" aria-label="4 / 4" style="width: 163.429px; margin-right: 60px;">--}}
    {{--                                <div class="product-include">--}}
    {{--                                    <a data-target="#product-4" class="">--}}
    {{--                                        <div class="flex items-center justify-center w-12 h-12 mx-auto lg:w-32 lg:h-32 img">--}}
    {{--                                            <img src="/data/img/product/package-1/q-complete-vanilla.jpeg" alt="Q COMPLETE Vanilla">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="w-full mt-4 text-center lg:mt-6 name">Q COMPLETE Vanilla</div>--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>--}}
    {{--                </div>--}}
    {{--                <div id="product-tab" class="mt-16 text-sm product-info md:text-xl">--}}
    {{--                    <div class="tab active" id="product-1">--}}
    {{--                        <div class="items-center row">--}}
    {{--                            <div class="w-full col md:w-1/2">--}}
    {{--                                <h4 class="uppercase text-2xl xl:text-[45px] font-bold mb-6 font-title"><a>Q DAILY DETOX Herbal Tea</a></h4>--}}
    {{--                                <div class="product-detail xl:pr-10" style="color: #666666;">--}}
    {{--                                    <p class="mb-3">You are exposed daily to pollution in the air, in some of the products you use, and in the food you eat. Your body is like a sponge, absorbing the good AND the bad. Don’t worry, no need--}}
    {{--                                        for drastic, uncomfortable cleanse regimens. Just keep it clean daily. <br>This subtle yet effective emerald blue tea is designed to cleanse and purify your body’s detox pathways. When you cleanse and--}}
    {{--                                        purify, you feel lighter and eliminate toxins. You might even lose weight, too. <br>Cleanse your body. Cleanse your life.</p>--}}
    {{--                                    <p class="mb-2"><strong>Benefits:</strong></p>--}}
    {{--                                    <ul class="pl-5 list-disc">--}}
    {{--                                        <li class="mb-3">Cleanse the body’s filtering systems*</li>--}}
    {{--                                        <li class="mb-3">Improve digestion and absorption*</li>--}}
    {{--                                        <li class="mb-3">Boost energy and metabolism*</li>--}}
    {{--                                        <li class="mb-3">Improve elimination while easing bloat and gas*</li>--}}
    {{--                                        <li class="mb-3">Slow the formation of fat cells*</li>--}}
    {{--                                        <li class="mb-3">Remove excess fluid*</li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-full mt-5 mt:md-0 col md:w-1/2">--}}
    {{--                                <img src="/data/img/product/package-1/q-detox-herbal-tea.jpeg" class="xl:rounded-[40px] rounded-2xl" alt="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tab" id="product-2">--}}
    {{--                        <div class="items-center row">--}}
    {{--                            <div class="w-full col md:w-1/2">--}}
    {{--                                <h4 class="uppercase text-2xl xl:text-[45px] font-bold mb-6 font-title"><a>Q ULTRA GREENS</a></h4>--}}
    {{--                                <div class="product-detail xl:pr-10" style="color: #666666;">--}}
    {{--                                    <p class="mb-3">Fill nutritional gaps, detoxify your body, and balance PH levels for better health and wellness. Boasting 20 superfoods, this nutrient-packed superstar will help boost energy, support--}}
    {{--                                        digestion, and just flat out make you feel better.*</p>--}}
    {{--                                    <p class="mb-2"><strong>Benefits:</strong></p>--}}
    {{--                                    <ul class="pl-5 list-disc">--}}
    {{--                                        <li class="mb-3">Detoxifying enzymes*</li>--}}
    {{--                                        <li class="mb-3">May assist in healthy muscle growth*</li>--}}
    {{--                                        <li class="mb-3">Helps promote cellular energy*</li>--}}
    {{--                                        <li class="mb-3">May improve digestion*</li>--}}
    {{--                                        <li class="mb-3">High in micronutrients*</li>--}}
    {{--                                        <li class="mb-3">Supports in alkalizing the body*</li>--}}
    {{--                                        <li class="mb-3">Supports skin health*</li>--}}
    {{--                                    </ul>--}}
    {{--                                    <p class="mb-3"><strong>The Secret Ingredient:</strong> <br>Sulforaphane: A powerful antioxidant that helps neutralize toxins and promotes a healthy inflammatory response. * </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-full mt-5 mt:md-0 col md:w-1/2">--}}
    {{--                                <img src="/data/img/product/package-1/q-ultra-greens.jpeg" class="xl:rounded-[40px] rounded-2xl" alt="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tab" id="product-3">--}}
    {{--                        <div class="items-center row">--}}
    {{--                            <div class="w-full col md:w-1/2">--}}
    {{--                                <h4 class="uppercase text-2xl xl:text-[45px] font-bold mb-6 font-title"><a>Q SLEEP Spray</a></h4>--}}
    {{--                                <div class="product-detail xl:pr-10" style="color: #666666;">--}}
    {{--                                    <p class="mb-3"><strong>Natural Spearmint Flavor</strong>--}}
    {{--                                        <br>Designed for the same great sleep you know and love— now featuring calming Chamomile.--}}
    {{--                                        <br>Ingredients including Melatonin, Chamomile Flower, 5-HTP, Passionflower, Feverfew, and more, are intended to work together, and whisk you away to a great night’s sleep. Children’s instructions now--}}
    {{--                                        available.</p>--}}
    {{--                                    <p class="mb-2"><strong>Formulated to:</strong></p>--}}
    {{--                                    <ul class="pl-5 list-disc">--}}
    {{--                                        <li class="mb-3">Support healthful rest and relaxation*</li>--}}
    {{--                                        <li class="mb-3">Help body and mind rejuvenate throughout the night*</li>--}}
    {{--                                        <li class="mb-3">Promote relaxation*</li>--}}
    {{--                                        <li class="mb-3">Encourage the body to stay asleep all night long*</li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-full mt-5 mt:md-0 col md:w-1/2">--}}
    {{--                                <img src="/data/img/product/package-1/q-sleep-spray.jpeg" class="xl:rounded-[40px] rounded-2xl" alt="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tab" id="product-4">--}}
    {{--                        <div class="items-center row">--}}
    {{--                            <div class="w-full col md:w-1/2">--}}
    {{--                                <h4 class="uppercase text-2xl xl:text-[45px] font-bold mb-2 font-title"><a>Q COMPLETE Vanilla</a></h4>--}}
    {{--                                <p class="mb-6">*Only for 4-months course</p>--}}
    {{--                                <div class="product-detail xl:pr-10" style="color: #666666;">--}}
    {{--                                    <p class="mb-3">This creamy, delicious shake will leave you so satisfied, you won't even THINK about cheating when it comes to a healthy diet. With fiber, digestive enzymes, and pre &amp; probiotics, Q--}}
    {{--                                        COMPLETE will keep things running smoother than ever. Q COMPLETE also contains mood-lifting B vitamins to help chase away those weight loss blues. All in less than 170 calories!*</p>--}}
    {{--                                    <p class="mb-2"><strong>Benefits:</strong></p>--}}
    {{--                                    <ul class="pl-5 list-disc">--}}
    {{--                                        <li class="mb-3">Controls hunger and cravings for hours*</li>--}}
    {{--                                        <li class="mb-3">Mood-boosting vitamins*</li>--}}
    {{--                                        <li class="mb-3">Nutritionally complete*</li>--}}
    {{--                                        <li class="mb-3">Fights insulin resistance*</li>--}}
    {{--                                        <li class="mb-3">Targets abdominal fat*</li>--}}
    {{--                                        <li class="mb-3">Helps prevent starch absorption*</li>--}}
    {{--                                        <li class="mb-3">Digestive enzymes, pre &amp; probiotics, and fiber for digestive support*</li>--}}
    {{--                                        <li class="mb-3">Plant-based protein*</li>--}}
    {{--                                        <li class="mb-3">Vegan, no soy, no dairy, no added sugar*</li>--}}
    {{--                                        <li class="mb-3">White Kidney Bean extract*</li>--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-full mt-5 mt:md-0 col md:w-1/2">--}}
    {{--                                <img src="/data/img/product/package-1/q-complete-vanilla.jpeg" class="xl:rounded-[40px] rounded-2xl" alt="">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    {{--        <section id="package-other">--}}
    {{--            <div class="container relative py-12 lg:py-16 2xl:py-20">--}}
    {{--                <h2 class="uppercase text-2xl xl:text-[45px] font-bold font-title text-center mb-7 lg:mb-12">Other package</h2>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="w-full md:w-1/3 col">--}}
    {{--                        <div class="product rounded-2xl md:rounded-3xl xl:rounded-[50px] p-5 lg:p-12">--}}
    {{--                            <div class="mb-4 text-center img">--}}
    {{--                                <a href="/product/recovery-package">--}}
    {{--                                    <img src="/data/img/product/4-months/recovery.png" alt="" class="block mx-auto h-auto md:h-[200px] object-contain w-auto">--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <h4 class="product-name"><a href="/product/recovery-package">Recovery Package</a></h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="w-full mt-5 md:w-1/3 col md:mt-0">--}}
    {{--                        <div class="product rounded-2xl md:rounded-3xl xl:rounded-[50px] p-5 lg:p-12">--}}
    {{--                            <div class="mb-4 text-center img">--}}
    {{--                                <a href="/product/transformation-package">--}}
    {{--                                    <img src="/data/img/product/4-months/transformation.png" alt="" class="block mx-auto h-auto md:h-[200px] object-contain w-auto">--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <h4 class="product-name"><a href="/product/transformation-package">Transformation Package</a></h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="w-full mt-5 md:w-1/3 col md:mt-0">--}}
    {{--                        <div class="product rounded-2xl md:rounded-3xl xl:rounded-[50px] p-5 lg:p-12">--}}
    {{--                            <div class="mb-4 text-center img">--}}
    {{--                                <a href="/product/revitalization-package">--}}
    {{--                                    <img src="/data/img/product/4-months/revitalization-men.png" alt="" class="block mx-auto h-auto md:h-[200px] object-contain w-auto">--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <h4 class="product-name"><a href="/product/revitalization-package">Revitalization Package</a></h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    {{--        <script>--}}
    {{--            window.document.addEventListener('DOMContentLoaded', () => {--}}
    {{--                if (document.getElementById('product-nav')) {--}}
    {{--                    const swiper2 = new Swiper('#product-nav .swiper', {--}}
    {{--                        slidesPerView: 2,--}}
    {{--                        spaceBetween: 30,--}}
    {{--                        centerInsufficientSlides: true,--}}
    {{--                        // loop: true,--}}
    {{--                        pagination: {--}}
    {{--                            el: '#product-nav .swiper-pagination',--}}
    {{--                            clickable: true,--}}
    {{--                        },--}}
    {{--                        navigation: {--}}
    {{--                            nextEl: '#product-nav .swiper-button-next',--}}
    {{--                            prevEl: '#product-nav .swiper-button-prev',--}}
    {{--                        },--}}
    {{--                        breakpoints: {--}}
    {{--                            640: {--}}
    {{--                                slidesPerView: 3,--}}
    {{--                                spaceBetween: 20,--}}
    {{--                            },--}}
    {{--                            768: {--}}
    {{--                                slidesPerView: 4,--}}
    {{--                                spaceBetween: 40,--}}
    {{--                            },--}}
    {{--                            1024: {--}}
    {{--                                slidesPerView: 5,--}}
    {{--                                spaceBetween: 50,--}}
    {{--                            },--}}
    {{--                            1400: {--}}
    {{--                                slidesPerView: 7,--}}
    {{--                                spaceBetween: 60,--}}
    {{--                            },--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                }--}}
    {{--            });--}}
    {{--        </script>--}}

</div>
{{--<script src="/data/js/script.dev.js"></script>--}}
