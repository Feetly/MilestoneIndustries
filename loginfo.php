<?php 
	//while checking in your system, please make valid changes here 
	$servername 	= "localhost";
	$username   	= "root";
	$password   	= "";


    //data base for emails (subscription)
    //email table :
    $email_table    = "emails";
    $email_col      = "email";
    $email_database 		= "mbvlin_subscribers";
    $isSubed = "isSubed";


    //database of products
    //product table :
    $product_database	= "mbvlin_products";
	$product_table  = "product";
    $product_name   = "prod_name";
    $product_sideinfo   = "prod_description";
    $product_id     = "id";
	$product_file   = "prod_file"; 
	$mainFrame 		= "mainFrame";
    $category       = "categories";

    //categories table :
    $category_table = "categories";
    $category_name  = "category";

    $otp_table = "otp";
    $feedback_table = "feedback";

    $sender_email = 'donotreply@mbvl.in';
    $sender_password = ';';
	
	$sender_email_up = 'updates@mbvl.in';
    $sender_password_up = '';
	
    $otpTime = 1;


    //this is product files path
    //put path of your products directory here ..
    $PATH = 'products';
 ?>


