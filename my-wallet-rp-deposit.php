<?php
include("init.php"); 

//razorpay settings
require('payment/razorpay/rp-config.php');
require('payment/razorpay/razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

$shippingAddress = "";
$shippingCityId = "";
$shippingPincode = "";

$customerName = $loggedUser->getName();
$customerMobile = $loggedUser->getMobile();

//razorpay setting
$orderCurrency = "INR";
$orderNote = "Wallet recharge";
$amount = $_GET['amount'];
$rpAmount = $amount * 100;
$displayCurrency = "INR";

//razorpay settings
$orderData = [
	'receipt'         => 3456,
	'amount'          => $rpAmount, //rupees in paise
	'currency'        => $displayCurrency,
	'payment_capture' => 1, // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

$checkout = 'automatic';

$data = [
	"key"               => $keyId,
	"amount"            => $rpAmount,
	"currency"	=> "INR",
	"name"              => "O2in - SBL Services",
	"returnurl"            => "my-wallet-rp-deposit-response.php",
	"description"       => $orderNote,
	"image"             => "https://o2inpro.com/images/logo.jpg",
	"prefill"           => [
	"name"              => $loggedUser->getName(),
	"email"             => "",
	"contact"             => $loggedUser->getMobile(),
	],
	"notes"             => [
		"userId" => $loggedUser->getId(),
		"paidamount" => $amount,
	],
	"theme"             => [
	"color"             => "#F37254"
	],
	"order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
	$data['display_currency']  = $displayCurrency;
	$data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
require("payment/razorpay/checkout/{$checkout}.php");
?>