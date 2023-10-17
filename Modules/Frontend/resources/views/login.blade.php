<x-front::layout.default>
    <div class="container mx-auto">
        <x-front::title>Login</x-front::title>
        <div class="flex  justify-center px-6 my-12">
            <!-- Row -->
            <x-splade-form :validateTrigger="'submit'" action="/login" method="POST">
                <a-card class="px-4 " body-style="width:500px">
                    <x-splade-input name="email" label="Email" type="email" required autocomplete="off"/>
                    <x-splade-input name="password" type="password" label="Password" required autocomplete="off"/>
                    @if(settings('recaptcha_auth_enable') == 'active')
                        <x-splade-input name="captcha" type="hidden" required
                                        autocomplete="off"/>
                        <Recaptcha v-model:value="form.captcha" action="test"
                                   site_key="{{settings('recaptcha_site_key')}}" v-slot="{ result }">
                            <x-splade-submit
                                v-bind:disabled="!result"
                                data-badge="inline"
                                class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                                :spinner="true"/>
                        </Recaptcha>
                    @else
                        <x-splade-submit
                            data-badge="inline"
                            class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                            :spinner="true"/>
                    @endif

                    <div class="inline-flex mt-3 w-full">
                        <Link class="mr-5" href="/reset-password">
                            Reset password
                        </Link>
                        <Link  href="/signup">
                            Signup
                        </Link>
                    </div>
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
