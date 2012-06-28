<?php

	//! Tradetracker Redirect-Page.

	// Set domain name on which the redirect-page runs, WITHOUT "www.".
	$domainName = '';

	// Set the P3P compact policy.
	header('P3P: CP="ALL PUR DSP CUR ADMi DEVi CONi OUR COR IND"');

	// Define parameters.
	$canRedirect = true;

	// Set parameters.
	if (isset($_GET['campaignID']))
	{
		$campaignID = $_GET['campaignID'];
		$materialID = isset($_GET['materialID']) ? $_GET['materialID'] : '';
		$affiliateID = isset($_GET['affiliateID']) ? $_GET['affiliateID'] : '';
		$redirectURL = isset($_GET['redirectURL']) ? $_GET['redirectURL'] : '';
		$reference = '';
	}
	else if (isset($_GET['tt']))
	{
		$trackingData = explode('_', $_GET['tt']);

		$campaignID = isset($trackingData[0]) ? $trackingData[0] : '';
		$materialID = isset($trackingData[1]) ? $trackingData[1] : '';
		$affiliateID = isset($trackingData[2]) ? $trackingData[2] : '';
		$reference = isset($trackingData[3]) ? $trackingData[3] : '';

		$redirectURL = isset($_GET['r']) ? $_GET['r'] : '';
	}
	else
		$canRedirect = false;

	if ($canRedirect)
	{
		// Calculate MD5 checksum.
		$checkSum = md5('CHK_' . $campaignID . '::' . $materialID . '::' . $affiliateID . '::' . $reference);

		// Set session/cookie arguments.
		$cookieName = 'TT2_' . $campaignID;
		$cookieValue = $materialID . '::' . $affiliateID . '::' . $reference . '::' . $checkSum . '::' . time();

		// Create tracking cookie.
		setcookie($cookieName, $cookieValue, (time() + 31536000), '/', !empty($domainName) ? '.' . $domainName : null);

		// Create tracking session.
		session_start();

		// Set session data.
		$_SESSION[$cookieName] = $cookieValue;

		// Set track-back URL.
		$trackBackURL = 'http://tc.tradetracker.net/?c=' . $campaignID . '&m=' . $materialID . '&a=' . $affiliateID . '&r=' . urlencode($reference) . '&u=' . urlencode($redirectURL);

		// Redirect to TradeTracker.
		header('Location: ' . $trackBackURL, true, 301);
	}

?>