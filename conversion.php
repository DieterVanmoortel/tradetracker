<?php

	//! TradeTracker Conversion-Tag.
	
	// Create session.
	session_start();
	
	// Define parameters.
	$campaignID = isset($_GET['campaignID']) ? $_GET['campaignID'] : '';
	$productID = isset($_GET['productID']) ? $_GET['productID'] : '';
	$conversionType = isset($_GET['conversionType']) ? $_GET['conversionType'] : '';
	$useHttps = isset($_GET['https']) && $_GET['https'] === '1';
	
	// Get tracking data from the session created on the redirect-page.
	$trackingData = isset($_SESSION['TT2_' . $campaignID]) ? $_SESSION['TT2_' . $campaignID] : '';
	$trackingType = '1';
	
	// If tracking data is empty.
	if (empty($trackingData))
	{
		// Get tracking data from the cookie created on the redirect-page.
		$trackingData = isset($_COOKIE['TT2_' . $campaignID]) ? $_COOKIE['TT2_' . $campaignID] : '';
		$trackingType = '2';
	}
	
	// Set transaction information.
	$transactionID = isset($_GET['transactionID']) ? $_GET['transactionID'] : ''; // Transaction identifier.
	$transactionAmount = isset($_GET['transactionAmount']) ? $_GET['transactionAmount'] : ''; // Transaction amount.
	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : ''; // Quantity (optional).
	$email = isset($_GET['email']) ? $_GET['email'] : ''; // Customer e-mail address if available (optional).
	$descriptionMerchant = isset($_GET['descrMerchant']) ? $_GET['descrMerchant'] : ''; // Transaction details for merchants (optional).
	$descriptionAffiliate = isset($_GET['descrAffiliate']) ? $_GET['descrAffiliate'] : ''; // Transaction details for affiliates (optional).
	
	// Set track-back URL.
	$trackBackURL = ($useHttps ? 'https' : 'http') . '://' . ($conversionType === 'lead' ? 'tl' : 'ts') . '.tradetracker.net/?cid=' . $campaignID . '&pid=' . $productID . '&data=' . urlencode($trackingData) . '&type=' . $trackingType . '&tid=' . urlencode($transactionID) . '&tam=' . urlencode($transactionAmount) . '&qty=' . urlencode($quantity) . '&eml=' . urlencode($email) . '&descrMerchant=' . urlencode($descriptionMerchant) . '&descrAffiliate=' . urlencode($descriptionAffiliate);
	
	// Register transaction.
	header('Location: ' . $trackBackURL);

?>