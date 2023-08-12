@extends("Frontend::layout.index")
@section('content')
    <div class="bg-white mt-4 xl:max-w-screen-xl lg:max-w-screen-lg mx-auto">
        <div class="grid grid-cols-4 gap-4 bg-gray-50">
            <div class="shadow-md rounded-lg">
                @include("Frontend::profile.sidebar")
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-3">
                    <!-- My Cart -->
                    <div class="w-full h-fit gap-4 p-4 col-span-3">
                        <!-- Product -->
                        <h2 class="text-blue-900 text-xl font-extrabold">Giỏ hàng</h2>
                        <section>


                        </section>
                        <div class="flex flex-row text-lg font-semibold shadow-md border rounded-sm justify-between py-2 mt-4">
                            <div class="text-gray-700 py-2 m-2">
                                <!-- Product Information -->
                                <div class="flex flex-row">
                                    <div class="w-28 h-28">
                                        <img class="w-full h-full" src="https://static.netshoes.com.br/produtos/tenis-adidas-coreracer-masculino/09/NQQ-4635-309/NQQ-4635-309_zoom1.jpg?ts=1675445414&ims=544x">
                                    </div>
                                    <div class="flex flex-col gap-1 text-left px-2 flex justify-center">
                                        <p class="text-lg text-gray-800 font-semibold">Adidas Coreracer Men's Shoes</p>
                                        <p class="text-xs text-gray-600 font-semibold">Color: <span class="font-normal">Black + Zinc</span></p>
                                        <p class="text-xs text-gray-600 font-semibold">Size: <span class="font-normal">42</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-700 text-left px-4 py-2 m-2 flex flex-col justify-center">
                                <p class="text-gray-600 font-normal text-sm line-through">
                                    $99.99
                                    <span class="text-emerald-500 ml-2">(-50% OFF)</span>
                                </p>
                                <p class="text-gray-800 font-normal text-xl">$49.99</p>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <div class="flex flex-column justify-center">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <input type="text" readonly="readonly" value="1" class="w-8 h-8 self-center text-gray-900 text-sm outline-none border border-gray-300 rounded-sm">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 5v14M5 12h14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <button class="">
                                    <svg class="" height="24px" width="24px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g>
                                                    <path
                                                        d="M400,113.3h-80v-20c0-16.2-13.1-29.3-29.3-29.3h-69.5C205.1,64,192,77.1,192,93.3v20h-80V128h21.1l23.6,290.7   c0,16.2,13.1,29.3,29.3,29.3h141c16.2,0,29.3-13.1,29.3-29.3L379.6,128H400V113.3z M206.6,93.3c0-8.1,6.6-14.7,14.6-14.7h69.5   c8.1,0,14.6,6.6,14.6,14.7v20h-98.7V93.3z M341.6,417.9l0,0.4v0.4c0,8.1-6.6,14.7-14.6,14.7H186c-8.1,0-14.6-6.6-14.6-14.7v-0.4   l0-0.4L147.7,128h217.2L341.6,417.9z"/>
                                                    <g>
                                                        <rect height="241" width="14" x="249" y="160"/>
                                                        <polygon points="320,160 305.4,160 294.7,401 309.3,401"/>
                                                        <polygon points="206.5,160 192,160 202.7,401 217.3,401"/>
                                                    </g>
                                                </g>
                                                </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-row text-lg font-semibold shadow-md border rounded-sm justify-between py-2 mt-4">
                            <div class="text-gray-700 py-2 m-2">
                                <!-- Product Information -->
                                <div class="flex flex-row">
                                    <div class="w-28 h-28">
                                        <img class="w-full h-full" src="https://static.netshoes.com.br/produtos/tenis-adidas-coreracer-masculino/09/NQQ-4635-309/NQQ-4635-309_zoom1.jpg?ts=1675445414&ims=544x">
                                    </div>
                                    <div class="flex flex-col gap-1 text-left px-2 flex justify-center">
                                        <p class="text-lg text-gray-800 font-semibold">Adidas Coreracer Men's Shoes</p>
                                        <p class="text-xs text-gray-600 font-semibold">Color: <span class="font-normal">Black + Zinc</span></p>
                                        <p class="text-xs text-gray-600 font-semibold">Size: <span class="font-normal">42</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-700 text-left px-4 py-2 m-2 flex flex-col justify-center">
                                <p class="text-gray-600 font-normal text-sm line-through">
                                    $99.99
                                    <span class="text-emerald-500 ml-2">(-50% OFF)</span>
                                </p>
                                <p class="text-gray-800 font-normal text-xl">$49.99</p>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <div class="flex flex-column justify-center">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <input type="text" readonly="readonly" value="1" class="w-8 h-8 self-center text-gray-900 text-sm outline-none border border-gray-300 rounded-sm">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 5v14M5 12h14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <button class="">
                                    <svg class="" height="24px" width="24px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g>
                                                    <path
                                                        d="M400,113.3h-80v-20c0-16.2-13.1-29.3-29.3-29.3h-69.5C205.1,64,192,77.1,192,93.3v20h-80V128h21.1l23.6,290.7   c0,16.2,13.1,29.3,29.3,29.3h141c16.2,0,29.3-13.1,29.3-29.3L379.6,128H400V113.3z M206.6,93.3c0-8.1,6.6-14.7,14.6-14.7h69.5   c8.1,0,14.6,6.6,14.6,14.7v20h-98.7V93.3z M341.6,417.9l0,0.4v0.4c0,8.1-6.6,14.7-14.6,14.7H186c-8.1,0-14.6-6.6-14.6-14.7v-0.4   l0-0.4L147.7,128h217.2L341.6,417.9z"/>
                                                    <g>
                                                        <rect height="241" width="14" x="249" y="160"/>
                                                        <polygon points="320,160 305.4,160 294.7,401 309.3,401"/>
                                                        <polygon points="206.5,160 192,160 202.7,401 217.3,401"/>
                                                    </g>
                                                </g>
                                                </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-row text-lg font-semibold shadow-md border rounded-sm justify-between py-2 mt-4">
                            <div class="text-gray-700 py-2 m-2">
                                <!-- Product Information -->
                                <div class="flex flex-row">
                                    <div class="w-28 h-28">
                                        <img class="w-full h-full" src="https://static.netshoes.com.br/produtos/tenis-adidas-coreracer-masculino/09/NQQ-4635-309/NQQ-4635-309_zoom1.jpg?ts=1675445414&ims=544x">
                                    </div>
                                    <div class="flex flex-col gap-1 text-left px-2 flex justify-center">
                                        <p class="text-lg text-gray-800 font-semibold">Adidas Coreracer Men's Shoes</p>
                                        <p class="text-xs text-gray-600 font-semibold">Color: <span class="font-normal">Black + Zinc</span></p>
                                        <p class="text-xs text-gray-600 font-semibold">Size: <span class="font-normal">42</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-700 text-left px-4 py-2 m-2 flex flex-col justify-center">
                                <p class="text-gray-600 font-normal text-sm line-through">
                                    $99.99
                                    <span class="text-emerald-500 ml-2">(-50% OFF)</span>
                                </p>
                                <p class="text-gray-800 font-normal text-xl">$49.99</p>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <div class="flex flex-column justify-center">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <input type="text" readonly="readonly" value="1" class="w-8 h-8 self-center text-gray-900 text-sm outline-none border border-gray-300 rounded-sm">
                                    <button class="w-5 h-5 self-center rounded-full border border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 5v14M5 12h14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-700 px-4 py-2 m-2 flex flex-row justify-center">
                                <button class="">
                                    <svg class="" height="24px" width="24px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g>
                                                    <path
                                                        d="M400,113.3h-80v-20c0-16.2-13.1-29.3-29.3-29.3h-69.5C205.1,64,192,77.1,192,93.3v20h-80V128h21.1l23.6,290.7   c0,16.2,13.1,29.3,29.3,29.3h141c16.2,0,29.3-13.1,29.3-29.3L379.6,128H400V113.3z M206.6,93.3c0-8.1,6.6-14.7,14.6-14.7h69.5   c8.1,0,14.6,6.6,14.6,14.7v20h-98.7V93.3z M341.6,417.9l0,0.4v0.4c0,8.1-6.6,14.7-14.6,14.7H186c-8.1,0-14.6-6.6-14.6-14.7v-0.4   l0-0.4L147.7,128h217.2L341.6,417.9z"/>
                                                    <g>
                                                        <rect height="241" width="14" x="249" y="160"/>
                                                        <polygon points="320,160 305.4,160 294.7,401 309.3,401"/>
                                                        <polygon points="206.5,160 192,160 202.7,401 217.3,401"/>
                                                    </g>
                                                </g>
                                                </svg>
                                </button>
                            </div>
                        </div>


                    </div>

                    <!-- Purchase Resume -->
                    <div class="flex flex-col w-full h-fit gap-4 p-4">
                        <p class="text-blue-900 text-xl font-extrabold">Purchase Resume</p>
                        <div class="flex flex-col p-4 gap-4 text-lg font-semibold shadow-md border rounded-sm">
                            <div class="flex flex-row justify-between">
                                <p class="text-gray-600">Subtotal (2 Items)</p>
                                <p class="text-end font-bold">$99.98</p>
                            </div>
                            <hr class="bg-gray-200 h-0.5">
                            <div class="flex flex-row justify-between">
                                <p class="text-gray-600">Freight</p>
                                <div>
                                    <p class="text-end font-bold">$3.90</p>
                                    <p class="text-gray-600 text-sm font-normal">Arrives on Jul 16</p>
                                </div>
                            </div>
                            <hr class="bg-gray-200 h-0.5">
                            <div class="flex flex-row justify-between">
                                <p class="text-gray-600">Discount Coupon</p>
                                <a class="text-gray-500 text-base underline" href="#">Add</a>
                            </div>
                            <hr class="bg-gray-200 h-0.5">
                            <div class="flex flex-row justify-between">
                                <p class="text-gray-600">Total</p>
                                <div>
                                    <p class="text-end font-bold">$103.88</p>
                                </div>
                            </div>
                            <div class="gap-2">
                                <button class="transition-colors text-sm bg-blue-600 hover:bg-blue-700 p-2 rounded-sm w-full text-white text-hover shadow-md mb-5">
                                    FINISH
                                </button>
                                <button class="transition-colors text-sm bg-white border border-gray-600 p-2 rounded-sm w-full text-gray-700 text-hover shadow-md">
                                    ADD MORE PRODUCTS
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

