<?php
    error_reporting(0);
	require_once "lbr/Session.php";
	Session::start();
	require_once "core/App.php";
	require_once "core/Controller.php";
	require_once "config/paths.php";
	require_once "config/DBconfig.php";
	require_once "lbr/Database.php";
	require_once "lbr/ActiveRecord.php";
	require_once "lbr/Validate.php";
	require_once "lbr/Common.php";
	require_once "lbr/Token.php";
	require_once "lbr/CustomException.php";
	require_once "classes/BackCameras.php";
	require_once "classes/Batteries.php";
	require_once "classes/Brands.php";
	require_once "classes/Colors.php";
	require_once "classes/Comments.php";
	require_once "classes/CommentStatus.php";
	require_once "classes/Errors.php";
	require_once "classes/FrontCameras.php";
	require_once "classes/Images.php";
	require_once "classes/ImageStatus.php";
	require_once "classes/InternalMemories.php";
	require_once "classes/Orders.php";
	require_once "classes/OrderStatus.php";
	require_once "classes/Phones.php";
	require_once "classes/PhoneStatus.php";
	require_once "classes/Privileges.php";
	require_once "classes/RamMemories.php";
	require_once "classes/ScreenResolutions.php";
	require_once "classes/ScreenSizes.php";
	require_once "classes/SimSlots.php";
	require_once "classes/Systems.php";
	require_once "classes/Users.php";
	require_once "classes/UserStatus.php";

	
?>