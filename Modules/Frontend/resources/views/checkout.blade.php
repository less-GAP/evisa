<x-front::layout.default>

    <section class="py-10 md:pt-14 xl:pt-16 md:pb-20 xl:pb-32">
        <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">
            <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">
                <div class="bg-white h-1/3"></div>
                <div class="h-1/3"
                     style="background: linear-gradient( to right, rgb(233,68,220) 0%, rgb(35,171,169) 25%, rgb(230,214,36) 50%, rgb(35,171,169) 75%, rgb(233,68,220) 100%); background-size: 200%; background-position: center;">
                </div>
                <div class="bg-white h-1/3"></div>
            </div>
            <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">
                <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">
                    <div class="hidden h-1/3"></div>
                    <div class="absolute bg-white h-1/3 mid-skew"></div>
                    <div class="hidden h-1/3"></div>
                    <div>
                        <h1
                            class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                            e-Visa Apply Online</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 lg:mt-20 mt-10 mb-5 lg:mb-10 text-center">
            <div class="">
                <a-steps class="w-full lg:w-[700px] m-auto " :current="{{$visaApplication->payment_status == 'success'?3:2}}" status="success" :items="[
                {
                    title: 'Visa Options'
                },
                {
                    title: 'Applicant Detail',
                },
                {
                    title: 'Review & Payment',
                },
            ]"></a-steps>
                <div class="container mx-auto px-4 mt-10 mb-5 lg:mb-10 text-center">


                    @if($visaApplication->payment_status == 'success')
                        <a-result style="margin:0 auto" status="success" title="Payment Successfully!"

                                  sub-title="Order number: {{$visaApplication->order_no}} We will contact with you soon, please wait.">
                        </a-result>
                    @else
                        <div class=" mb-2 mt-5 text-center">You'll be charged
                            ${{$visaApplication->total_amount}}.00, including
                            ${{$visaApplication->vat_fee}} for VAT
                        </div>
                        <div
                            id="paypal-button-container"
                            class="w-[400px] m-auto css-dev-only-do-not-override-eq3tly ant-result-success">
                            <div id="payment-form">
                                <div id="payment-status-container"></div>
                                <div id="card-container" class="mt-10"></div>
                                <button id="card-button"
                                        class="!mt-1 m-auto flex disabled:bg-gray-500 items-center justify-center uppercase p-4 mt-5 text-2xl text-white bg-black 2xl:text-3xl lg:mt-10"
                                        type="button">
                                    <svg

                                        class="animate-spin hidden mr-3 h-5 w-5  text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    >
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"/>
                                        <path class="opacity-75" fill="currentColor"
                                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                                    </svg>
                                    Pay now
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    @if($visaApplication->payment_status !== 'success')

        <x-splade-script>
            window.createPayment = async function (token) {
            const dataJsonString = JSON.stringify({
            token
            });

            try {
            const response = await fetch("process-payment", {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            },
            body: dataJsonString,
            });

            const data = await response.json();
            window.location.reload()

            if (data.errors && data.errors.length > 0) {
            if (data.errors[0].detail) {
            window.showError(data.errors[0].detail);
            } else {
            window.showError("Payment Failed.");
            }
            } else {
            window.location.reload()
            }
            } catch (error) {
            console.error("Error:", error);
            }
            };
            async function initSquare(){
            const payments = Square.payments('{{settings('square_app_id')}}', '{{settings('square_location_id')}}');
            const card = await payments.card();
            await card.attach('#card-container');

            const cardButton = document.getElementById('card-button');
            cardButton.addEventListener('click', async () => {

            const statusContainer = document.getElementById('payment-status-container');

            try {
            jQuery('#card-button').attr('disabled',true)
            jQuery('#card-button .animate-spin').show()
            const result = await card.tokenize();
            if (result.status === 'OK') {
            await createPayment(result.token)
            console.log(`Payment token is ${result.token}`);
            statusContainer.innerHTML = "Payment Successful";
            } else {
            let errorMessage = `Tokenization failed with status: ${result.status}`;
            if (result.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
            result.errors
            )}`;
            }
            jQuery('#card-button').attr('disabled',false)
            jQuery('#card-button .animate-spin').hide()
            throw new Error(errorMessage);
            }
            } catch (e) {
            console.error(e);
            statusContainer.innerHTML = "Payment Failed";
            }
            });
            }
            initSquare();
        </x-splade-script>
    @endif
</x-front::layout.default>
