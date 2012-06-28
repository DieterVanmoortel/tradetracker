<?php
/**
 * Implements hook_variable_group_info().
 */
function tradetracker_variable_group_info() {
  $groups['tradetracker'] = array(
    'title' => t('Tradetracker'),
    'description' => t('Tradetracker Settings.'),
    'access' => 'administer site',
  );
  return $groups;
}

/**
 * Implements hook_variable_info().
 */
function tradetracker_variable_info($options) {
  $variables['tt_campaignid'] = array(
    'title' => t('Campaign ID'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_productid'] = array(
    'title' => t('Group ID'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_https'] = array(
    'title' => t('HTTPS'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_convtype'] = array(
    'title' => t('Conversion Type'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_tid'] = array(
    'title' => t('Transaction ID'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_amount'] = array(
    'title' => t('TransactionAmount'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_email'] = array(
    'title' => t('Email'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_merchant'] = array(
    'title' => t('Merchant'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  $variables['tt_affiliate'] = array(
    'title' => t('Affiliate'),
    'type' => 'text',
    'group' => 'tradetracker',
  );
  return $variables;
}