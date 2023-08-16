@extends("Frontend::layout.index")
@section('content')
    <div class="grid grid-cols-4 max-w-screen-xl xl:mx-auto xl:grid-cols-4 gap-4 py-4">
        <div>
            @include("Frontend::profile.sidebar")
        </div>
        <div class="bg-white col-span-3 border-[1px] p-5">
            <h2 class="text-4xl font-extrabold dark:text-white py-5">Thông tin tài khoản</h2>
            <x-splade-form action="{{route('profile.update')}}" method="POST" :default="$customer_info">
                <div class="grid gap-6 mb-6 md:grid-cols-2 hidden">
                    <x-splade-file name="photo" filepond="{ allowDrop: false }" preview class="h-50" accept="image/*" v-model="form.photo"/>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <x-splade-input name="username" label="Tên đăng nhập*" autocomplete="off" v-model="form.username"/>

                    <x-splade-input name="name" label="Họ và tên*" autocomplete="off" v-model="form.name"/>

                    <x-splade-input name="phone" label="Phone*" autocomplete="off" v-model="form.phone"/>
                </div>
                <div class="mb-6">
                    <x-splade-input name="email" label="Email*" autocomplete="off" v-model="form.email"/>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <x-splade-select name="sex" label="Giới tính">
                        <option value="other">Khác</option>
                        <option value="men">Nam</option>
                        <option value="women">Nữ</option>
                    </x-splade-select>
                    <x-splade-input name="birthday" label="Ngày sinh" date/>

                    <x-splade-input name="referral_code" label="Mã người giới thiệu" autocomplete="off" v-model="form.referral_code" disabled/>
                </div>
                <div class="mb-6">
                    <div class="">
                        <label class="block">
                            <span class="block mb-1 text-gray-700 font-sans"> Link giới thiệu </span>
                            <div class="flex font-semibold">
                                {{$customer_info['link']}}
                            </div>
                        </label><!--v-if-->
                    </div>
                </div>
                <x-splade-submit label="Lưu" :spinner="true"/>
            </x-splade-form>
        </div>
    </div>
@endsection

