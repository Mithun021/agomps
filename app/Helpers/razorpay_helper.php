<?php

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

if (!function_exists('verifyRazorpaySignature')) {
    function verifyRazorpaySignature($attributes)
    {
        $api = new Api(getenv('RAZORPAY_KEY'), getenv('RAZORPAY_SECRET'));

        $expectedSignature = hash_hmac('sha256', 
            $attributes['razorpay_order_id'] . "|" . $attributes['razorpay_payment_id'], 
            getenv('RAZORPAY_SECRET')
        );

        if ($expectedSignature !== $attributes['razorpay_signature']) {
            throw new SignatureVerificationError('Invalid Razorpay signature.');
        }

        return true;
    }
}
