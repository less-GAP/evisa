<?php
lessgap_register_event_handler('after_customer_signup',\Modules\Frontend\Events\CustomerSignup::class.'@handle');
lessgap_register_event_handler('after_customer_auto_signup',\Modules\Frontend\Events\CustomerAutoSignup::class.'@handle');
lessgap_register_event_handler('after_visa_submitted',\Modules\Frontend\Events\EmailAfterSubmitVisa::class.'@handle');
