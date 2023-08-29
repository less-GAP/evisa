<script setup>
const props = defineProps({
    order_no: [String,Number],
    quantity: [String,Number]
})
const PayPalButton = window.paypal.Buttons.driver('vue', window.Vue)

const createOrder = function () {
    return (data) => {
        console.log(999,data)
        // Order is created on the server and the order id is returned
        return props.order_no;
    }
}
const onApprove = function () {
    return (data) => {
        // Order is captured on the server
        return fetch("/capture-paypal-order", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                orderID: data.orderID
            })
        })
            .then((response) => response.json());
    }
}
const onShippingChange = function () {
    return (data, actions) => {
        if (data.shipping_address.country_code !== 'US') {
            return actions.reject()
        }
        return actions.resolve()
    }
}
const onError = function () {
    return (err) => {
        console.error(err)
        window.location.href = '/your-error-page-here'
    }
}
const style = function () {
    return {
        shape: 'pill',
        color: 'gold',
        layout: 'horizontal',
        label: 'paypal',
        tagline: false,
    }
}


</script>
<template>
    <paypal-buttons :on-approve="onApprove" :create-order="createOrder" :on-shipping-change="onShippingChange"
                    :on-error="onError" :style-object="style"/>

</template>
