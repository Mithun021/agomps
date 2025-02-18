<?php

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

if (!function_exists('verifyRazorpaySignature')) {
    function verifyRazorpaySignature($attributes)
    {
        // Initialize Razorpay API
        $api = new Api(getenv('RAZORPAY_KEY'), getenv('RAZORPAY_SECRET'));

        // Expected signature to compare
        $expectedSignature = hash_hmac('sha256', 
            $attributes['razorpay_order_id'] . "|" . $attributes['razorpay_payment_id'], 
            getenv('RAZORPAY_SECRET')
        );

        // Verify signature
        if ($expectedSignature !== $attributes['razorpay_signature']) {
            throw new SignatureVerificationError('Invalid Razorpay signature.');
        }

        return true;
    }
}