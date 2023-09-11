<?php
$user = auth('frontend')->user();
$visaApplications = $user->visa_applications;
?>
<x-Frontend::layout.my-account>
    <div class="rounded-xl md:border md:border-neutral-100 dark:border-neutral-800 md:p-6">
        <a-row :gutter="50">
            <a-col :lg="12" :span="24">

                <x-splade-form :default="$user" :validateTrigger="'submit'" action="/my-account/edit-profile" method="POST">
                    <x-splade-input required name="full_name" label="Full Name" value="{{$user->full_name}}"
                                    autocomplete="off"/>
                    <x-splade-input required name="phone" label="Phone" autocomplete="off"/>
                    <x-splade-input name="email" label="Email" type="email" required autocomplete="off"/>
                    <x-splade-submit
                        label="Update Information"
                        class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl"
                        :spinner="true"/>

                </x-splade-form>
            </a-col>
            <a-col :lg="12" :span="24">
                <x-splade-form :validateTrigger="'submit'" action="/my-account/password" method="POST">

                    <x-splade-input name="password" type="password" label="Password" required autocomplete="off"/>
                    <x-splade-input type="password" name="password_confirmation" label="Confirm Password" required
                                    autocomplete="off"/>

                    <x-splade-submit
                        label="Change Password"
                        class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl"
                        :spinner="true"/>

                </x-splade-form>
            </a-col>
        </a-row>
    </div>
</x-Frontend::layout.my-account>
