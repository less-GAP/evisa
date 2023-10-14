<x-front::layout.default>

    <div class="container mx-auto flex flex-wrap py-6">
        <div class="w-full md:w-2/3 flex flex-col items-center px-4">
            {{$slot}}
        </div>
        <aside class="w-full md:w-1/3 relative flex flex-col items-center px-5">

            <div class="w-full bg-white sticky top-0 shadow flex flex-col my-4 p-6">
                <p class="text-xl uppercase font-semibold pb-5">Why apply with us?</p>
                <ul class="pl-5 list-none md:list-disc">
                    <li>
                        <b>
                            Takes less than 5 minutes
                        </b>
                        <p>
                            Our application form is user-friendly and simplified with fewer fields to fill in.
                        </p>
                    </li>
                    <li>
                        <b>
                            EXPERT REVIEW
                        </b>
                        <p>
                            Our immigration experts review all information and documents to ensure they meet the
                            requirements.
                        </p>
                    </li>
                    <li>
                        <b>

                            MONEY-BACK GUARANTEE
                        </b>
                        <p>
                            We offer a full refund for all fees in case your application is rejected.
                        </p>
                    </li>
                    <li>
                        <b>

                            PROMPT SUPPORT
                        </b>
                        <p>
                            We offer quick support via Whatsapp, chat and email.
                        </p>
                    </li>
                </ul>
                <Link href="/apply">
                    <x-front::button class="w-full">Apply Now</x-front::button>

                </Link>
            </div>


        </aside>
    </div>

</x-front::layout.default>
