@extends("Frontend::layout.index")
<div class="main" id="site-main">
    <section class="product_packages" style="background: radial-gradient(42.79% 42.79% at 32.41% 52.62%, #8AC6B0 0%, #4A9C7E 100%)">
        <div class="container relative py-12 lg:py-16">
            <div class="items-center row">
                <div class="w-full col md:w-full">
                    <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 bg-white border-8">
                        <div class="mx-auto max-w-3xl">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Thông tin đăng ký</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600"></p>
                            <x-splade-form action="{{route('register')}}" method="POST" class="space-y-6 mt-10" default="{ referral_code: '{{$ref_code}}' }">
                                <x-splade-input name="username" label="Tên đăng nhập*" autocomplete="off" :show-errors="true" validation-key="username"/>

                                <x-splade-input name="password" type="password" label="Mật khẩu*"/>

                                <x-splade-input name="password_confirmation" type="password" label="Nhập lại mật khẩu*"/>

                                <x-splade-input name="name" label="Họ và tên"/>

                                <x-splade-input name="phone" label="Điện thoại*"/>

                                <x-splade-input name="email" type="email" label="Email*"/>

                                <x-splade-input name="referral_code" label="Mã giới thiệu*" disabled/>
                                <div class="border-b border-gray-900/10 pb-6"></div>
                                <x-splade-submit :spinner="true"/>
                            </x-splade-form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute hidden translate-x-1/2 -translate-y-1/2 pointer-events-none model right-full top-1/2 w-max xl:block"
                 id="model-2">
                <img src="/data/img/product/package-3/model.png?ver=1" alt="Transformation Package - Model">
            </div>
            <div
                class="absolute hidden -translate-x-1/2 -translate-y-1/2 pointer-events-none model left-full top-1/2 w-max xl:block"
                id="model-1">
                <img src="/data/img/product/package-1/model.png?ver=1" alt="Kimble's MyQFIT Trainer Pack - Model">
            </div>
        </div>
</div>
