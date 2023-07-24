<?php
//session checker
session_start();
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

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
include('../controller/business-service-controller.php');
include('../controller/business-token-controller.php');
include('../controller/wallet-controller.php');
include('../controller/event-category-controller.php');
include('../controller/event-controller.php');
include('../controller/post-controller.php');
include('../controller/post-category-controller.php');
include('../controller/video-controller.php');
include('../controller/host-video-controller.php');



$configController = new ConfigController();

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
$businessServiceController = new BusinessServiceController();
$businessTokenController = new BusinessTokenController();
$walletController = new WalletController();
$eventCategoryController = new EventCategoryController();
$eventController = new EventController();
$postController = new PostController();
$postCategoryController = new PostCategoryController();
$videoController = new VideoController();
$hostVideoController = new HostVideoController();

//logged user details
if( !isset( $noLogin ))
{
	include("logged-user-detail.php");
}
$configs = $configController->getAll("active");

//system variable
$systemHostlink = "http://$_SERVER[HTTP_HOST]" . "/";
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
