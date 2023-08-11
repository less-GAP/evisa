@extends("Frontend::layout.index")
@section('content')
    <div class="grid grid-cols-8 w-4/6 h-screen xl:mx-auto xl:grid-cols-8 gap-4 py-4">
        @include("Frontend::profile.sidebar")
        <div class="bg-white h-screen xl:col-span-6 border-[1px] p-5">
            <h2 class="text-4xl font-extrabold dark:text-white py-5">Thông tin tài khoản</h2>
            <x-splade-form action="{{route('profile.update')}}" method="POST" :default="$customer_info">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <x-splade-file name="photo"  filepond="{ allowDrop: false }" preview class="h-50" accept="image/*"/>
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

                <x-splade-submit label="Lưu" :spinner="true"/>
            </x-splade-form>
        </div>
    </div>
@endsection

