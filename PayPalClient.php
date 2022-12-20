<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "ASXOxT_QYitJ7b_XGNwbkDxO2mut8E5ufZR6K_5-xZ50PKM9C3Tp0wDdEF0a48JSWpaMy_gUbhnSv7Jd";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EAwe9ETRnZO_PfY6wSQQ6uy6PcjvKXqjEeaKJdnmZ4B07xJq4FN8sTh_fBtmJcMf2HKkirWa6xdVg0Qe";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}