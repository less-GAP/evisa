<?php


?>
<div class="container px-4 py-10 mx-auto ">
    <div class="max-w-4xl mx-auto list-questions">
        <x-splade-form :validateTrigger="'submit'" action="/check-status" method="POST">
                <x-splade-input name="code" label="Booking Number:" type="text" required autocomplete="off"/>
                <x-splade-input name="email" type="email" label="Email" required autocomplete="off"/>
                <x-splade-submit
                    class="items-center justify-center transition p-4 mt-5 text-xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-xl w-full"
                    :spinner="true"/>
        </x-splade-form>
    </div>
</div>
