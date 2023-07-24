<?php
$noLogin = 1;
include("init.php");
//razorpay settings
require('payment/razorpay/rp-config.php');
require('payment/razorpay/razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

$success = false;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $success = true;
    /*
    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
		$success = true;
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
    */
}
else
{
	echo "not found";
}

if ($success === true)
{	
	//payment success
    $amount = $_POST['paidamount'] / 100;
	$paymentOrderId = $_POST['razorpay_payment_id'];
	$paymentReference = $_POST['razorpay_payment_id'];
	$userId = $_POST['userId'];
	$paymentStatus = "PAID";

    $user = $userController->getById($userId);
    $_SESSION['login_public_user_id'] = $user->getId();
	
	
    //echo "<br>" . $paymentReference;
    //$id, $userId, $deposit, $used, $refund, $gift, $actionDateTime, $reference, $remarks, $status
    $wallet = new Wallet(0, $userId, $amount, 0, 0, 0, "", $paymentReference, "Online Deposit", "active");
    $walletController->add($wallet);
	header("location: my-wallet.php");
	exit();
}
else
{
	//header("location: my-profile.php");
	//exit();
}

?>