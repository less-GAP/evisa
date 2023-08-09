@extends("Frontend::layout.index")
<div class="main" id="site-main">
    <section  class="product_packages" style="background: radial-gradient(42.79% 42.79% at 32.41% 52.62%, #8AC6B0 0%, #4A9C7E 100%)">
        <div class="container relative py-12 lg:py-16">
            <div class="items-center row">
                <div class="w-full col md:w-full">
                    <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8 bg-white border-8" >
                        <div class="mx-auto max-w-3xl">
                            <x-splade-form action="/users/store">
                                <x-splade-input name="username" :label="__('Username')" />
                            </x-splade-form>
                            <form>
                                <div class="space-y-12">
                                    <div class="border-b border-gray-900/10 pb-12">
                                        <h2 class="text-base font-semibold leading-7 text-gray-900">Thông tin đăng ký</h2>
                                        <p class="mt-1 text-sm leading-6 text-gray-600"></p>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-6">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Tên đăng nhập</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <span class="text-sm text-red-600"> These credentials do not match our records. </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nhập lại mật khẩu</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-3">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Họ</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Tên</label>
                                                <div class="mt-2">
                                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-6">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Điện thoại</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Quay lại</button>
                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" style="background-color: rgb(99 102 241 / var(--tw-bg-opacity));">Save</button>
                                </div>
                            </form>
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
