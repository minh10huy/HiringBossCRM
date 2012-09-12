<?php
$dashletData['ContactsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'title' => 
  array (
    'default' => '',
  ),
  'primary_address_country' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'huy to',
    'label' => 'LBL_ASSIGNED_TO',
  ),
);
$dashletData['ContactsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '30%',
    'label' => 'LBL_NAME',
    'link' => '1',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'title' => 
  array (
    'width' => '20s%',
    'label' => 'LBL_TITLE',
    'default' => true,
    'name' => 'title',
  ),
  'phone_work' => 
  array (
    'width' => '15%',
    'label' => 'LBL_OFFICE_PHONE',
    'default' => true,
    'name' => 'phone_work',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'assigned_user_name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'account_name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_ACCOUNT_NAME',
    'sortable' => '',
    'link' => '1',
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'ACLTag' => 'ACCOUNT',
    'name' => 'account_name',
    'default' => false,
  ),
  'email1' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => '',
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'name' => 'email1',
    'default' => false,
  ),
  'phone_home' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HOME_PHONE',
    'name' => 'phone_home',
    'default' => false,
  ),
  'phone_mobile' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
    'name' => 'phone_mobile',
    'default' => false,
  ),
  'phone_other' => 
  array (
    'width' => '10%',
    'label' => 'LBL_OTHER_PHONE',
    'name' => 'phone_other',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'nextcontact_c' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_NEXTCONTACT',
    'width' => '10%',
    'name' => 'nextcontact_c',
  ),
  'consultant_c' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_CONSULTANT',
    'width' => '10%',
    'name' => 'consultant_c',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'result_c' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_RESULT',
    'width' => '10%',
    'name' => 'result_c',
  ),
);
