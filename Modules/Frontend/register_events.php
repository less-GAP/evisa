<?php
lessgap_register_event('after_customer_signup',\Modules\Frontend\Events\CustomerSignup::class.'@handle');
lessgap_register_event('after_visa_submitted',\Modules\Frontend\Events\EmailAfterSubmitVisa::class.'@handle');
