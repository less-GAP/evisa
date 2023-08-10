@extends("Frontend::layout.index")
<div class="main" id="site-main">
    <section class="product_packages" style="background: radial-gradient(42.79% 42.79% at 32.41% 52.62%, #8AC6B0 0%, #4A9C7E 100%);min-height: 90vh">
        <div class="container relative py-16 lg:py-24">
            <div class="items-center row">
                <div class="w-full col md:w-full">
                    <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 bg-white border-8">
                        <div class="mx-auto max-w-3xl">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Thông tin đăng nhập</h2>
                            <x-splade-errors>
                                <p v-if="errors.has('field')" v-text="errors.first('field')" />
                            </x-splade-errors>
                            <p class="mt-1 text-sm leading-6 text-gray-600"></p>
                            <x-splade-form action="{{route('login.post')}}" method="POST" class="space-y-6 mt-10">
                                <x-splade-input name="username" label="Tên đăng nhập hoặc Email*" autocomplete="off"/>

                                <x-splade-input name="password" type="password" label="Mật khẩu*"/>

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
