<?php
//session checker
session_start();
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);

include('../controller/functions.php');
include('../controller/config-controller.php');

include('../controller/user-controller.php');
include('../controller/country-controller.php');
include('../controller/city-controller.php');
include('../controller/state-controller.php');
include('../controller/gender-controller.php');
include('../controller/contact-type-controller.php');
include('../controller/category-controller.php');
include('../controller/tag-controller.php');
include('../controller/business-controller.php');
include('../controller/business-detail-controller.php');
include('../controller/business-image-controller.php');
include('../controller/business-product-controller.php');
include('../controller/business-feedback-controller.php');
include('../controller/business-contact-type-controller.php');
include('../controller/business-tag-controller.php');
include('../controller/business-timing-controller.php');
include('../controller/business-token-controller.php');
include('../controller/business-service-controller.php');
include('../controller/event-category-controller.php');
include('../controller/event-controller.php');
include('../controller/post-controller.php');
include('../controller/post-category-controller.php');
include('../controller/video-controller.php');
include('../controller/wallet-controller.php');


$configController = new ConfigController();
$configs = $configController->getAll("active");

$userController = new UserController();
$categoryController = new CategoryController();
$countryController = new CountryController();
$cityController = new CityController();
$stateController = new StateController();
$genderController = new GenderController();
$contactTypeController = new ContactTypeController();
$tagController = new TagController();
$businessController = new BusinessController();
$businessDetailController = new BusinessDetailController();
$businessImageController = new BusinessImageController();
$businessProductController = new BusinessProductController();
$businessFeedbackController = new BusinessFeedbackController();
$businessContactTypeController = new BusinessContactTypeController();
$businessTimingController = new BusinessTimingController();
$businessTagController = new BusinessTagController();
$eventCategoryController = new EventCategoryController();
$eventController = new EventController();
$postController = new PostController();
$postCategoryController = new PostCategoryController();
$videoController = new VideoController();
$businessTokenController = new BusinessTokenController();
$businessServiceController = new BusinessServiceController();
$walletController = new WalletController();

//logged user details
include("logged-user-detail.php");


//system variable
$systemHostlink = "http://$_SERVER[HTTP_HOST]" . "/classified/";
$systemPagelink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$systemImage404 = $systemHostlink . "media/system/image404.png";
	
//themeoptions
$websiteTitle = "The King Phoenix - Admin Panel Kit";
$websiteDescription = "A Product Of The King Phoenix : www.thekingphoenix.com";
$websiteKeyword = "A Product Of The King Phoenix : www.thekingphoenix.com";
$websiteLogo = "../images/website_logo.png";
$websiteFavicon = "../images/favicon.png";
$websiteGoogleAnalytic = "";
?>
