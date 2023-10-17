<x-front::layout.default>
    <div class="container mx-auto">
        <x-front::title>SIGNUP</x-front::title>
        <div class="flex  justify-center px-6 my-12">
            <!-- Row -->
            <x-splade-form :validateTrigger="'submit'" action="/signup" method="POST">
                <a-card class="px-4 " body-style="width:500px">
                    <x-splade-input required name="full_name" label="Full Name" autocomplete="off"/>
                    <x-splade-input required name="phone" label="Phone" autocomplete="off"/>
                    <x-splade-input name="email" label="Email" type="email" required autocomplete="off"/>
                    <x-splade-input name="password" type="password" label="Password" required autocomplete="off"/>
                    <x-splade-input type="password" name="password_confirmation" label="Confirm Password" required
                                    autocomplete="off"/>
                    <x-splade-submit
                        class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                        :spinner="true">
                        Signup
                    </x-splade-submit>
                    @if(settings('login_google')=='active')
                        <GoogleLogin login_url="{{url('auth/google')}}"
                                     :success="()=>$splade.visit('/my-account')"
                                     client_id="{{settings('login_google_id')}}">

                        </GoogleLogin>
                    @endif
                </a-card>
            </x-splade-form>
        </div>
    </div>
</x-front::layout.default>
