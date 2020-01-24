//Basic Usage for Purchase
<?php
use Omnipay\Omnipay;
    use Exception;

    $gateway = Omnipay::create('Esewa_Secure');

    $gateway->setMerchantCode('test_merchant');
    $gateway->setTestMode(true);

    try {
        $response = $gateway->purchase([
            'amount' => 100,
            'deliveryCharge' => 0,
            'serviceCharge' => 0,
            'taxAmount' => 0,
            'totalAmount' => 100,
            'productCode' => 'ABAC2098',
            'returnUrl' => 'https://merchant.com/payment/1/complete',
            'failedUrl' => 'https://merchant.com/payment/1/failed',
        ])->send();

        if ($response->isRedirect()) {
            $response->redirect();
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
    //Verify Payemnt
    $gateway = Omnipay::create('Esewa_Secure');

    $gateway->setMerchantCode('test_merchant');
    $gateway->setTestMode(true);

    $response = $gateway->verifyPayment([
        'amount' => 100,
        'referenceNumber' => 'GDFG89',
        'productCode' => 'gadfg-gadf',
    ])->send();

    if ($response->isSuccessful()) {
        // Success
    }
     // Failed
    ?>
   