<?php
$dashletData['AccountsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'account_type' => 
  array (
    'default' => '',
  ),
  'industry' => 
  array (
    'default' => '',
  ),
  'billing_address_country' => 
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
$dashletData['AccountsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => '1',
    'default' => true,
    'name' => 'name',
  ),
  'nextcontact_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_NEXTCONTACT',
    'width' => '10%',
    'name' => 'nextcontact_c',
  ),
  'phone_fax' => 
  array (
    'width' => '8%',
    'label' => 'LBL_PHONE_FAX',
    'name' => 'phone_fax',
    'default' => false,
  ),
  'phone_alternate' => 
  array (
    'width' => '8%',
    'label' => 'LBL_OTHER_PHONE',
    'name' => 'phone_alternate',
    'default' => false,
  ),
  'billing_address_country' => 
  array (
    'width' => '8%',
    'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
    'default' => false,
    'name' => 'billing_address_country',
  ),
  'opp_name' => 
  array (
    'width' => '10%',
    'label' => 'Opp Name',
    'name' => 'opp_name',
    'default' => false,
    'link' => false,
  ),
  'phone_office' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_PHONE',
    'default' => false,
    'name' => 'phone_office',
  ),
  'website' => 
  array (
    'width' => '8%',
    'label' => 'LBL_WEBSITE',
    'default' => false,
    'name' => 'website',
  ),
  'billing_address_city' => 
  array (
    'width' => '8%',
    'label' => 'LBL_BILLING_ADDRESS_CITY',
    'name' => 'billing_address_city',
    'default' => false,
  ),
  'billing_address_street' => 
  array (
    'width' => '8%',
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'name' => 'billing_address_street',
    'default' => false,
  ),
  'billing_address_state' => 
  array (
    'width' => '8%',
    'label' => 'LBL_BILLING_ADDRESS_STATE',
    'name' => 'billing_address_state',
    'default' => false,
  ),
  'billing_address_postalcode' => 
  array (
    'width' => '8%',
    'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
    'name' => 'billing_address_postalcode',
    'default' => false,
  ),
  'shipping_address_city' => 
  array (
    'width' => '8%',
    'label' => 'LBL_SHIPPING_ADDRESS_CITY',
    'name' => 'shipping_address_city',
    'default' => false,
  ),
  'shipping_address_street' => 
  array (
    'width' => '8%',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'name' => 'shipping_address_street',
    'default' => false,
  ),
  'shipping_address_state' => 
  array (
    'width' => '8%',
    'label' => 'LBL_SHIPPING_ADDRESS_STATE',
    'name' => 'shipping_address_state',
    'default' => false,
  ),
  'shipping_address_postalcode' => 
  array (
    'width' => '8%',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
    'name' => 'shipping_address_postalcode',
    'default' => false,
  ),
  'shipping_address_country' => 
  array (
    'width' => '8%',
    'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
    'name' => 'shipping_address_country',
    'default' => false,
  ),
  'email1' => 
  array (
    'width' => '10%',
    'label' => 'Email',
    'name' => 'email1',
    'default' => false,
    'link' => false,
  ),
  'parent_name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_MEMBER_OF',
    'sortable' => '',
    'name' => 'parent_name',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'Contact Date',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'contact_name' => 
  array (
    'width' => '10%',
    'label' => 'Contact Name',
    'name' => 'contact_name',
    'default' => false,
    'link' => false,
  ),
  'phone_mobile' => 
  array (
    'width' => '10%',
    'label' => 'Mobile',
    'name' => 'phone_mobile',
    'default' => false,
    'link' => false,
  ),
  'title' => 
  array (
    'width' => '15%',
    'label' => 'Title',
    'name' => 'title',
    'default' => false,
    'link' => false,
  ),
  'contact_coldcall' => 
  array (
    'width' => '10%',
    'label' => 'Contact',
    'name' => 'contact_coldcall',
    'default' => false,
    'link' => false,
  ),
  'lead_owner' => 
  array (
    'width' => '10%',
    'label' => 'Lead Owner',
    'name' => 'lead_owner',
    'default' => false,
    'link' => false,
  ),
  'inside_sales' => 
  array (
    'width' => '10%',
    'label' => 'Inside Sales',
    'name' => 'inside_sales',
    'default' => false,
    'link' => false,
  ),
  'date_closed' => 
  array (
    'width' => '10%',
    'label' => 'Date Closed',
    'name' => 'date_closed',
    'default' => false,
    'link' => false,
  ),
  'products' => 
  array (
    'width' => '10%',
    'label' => 'Products',
    'name' => 'products',
    'default' => false,
    'link' => false,
  ),
  'subcription_fee' => 
  array (
    'width' => '10%',
    'label' => 'Subcription Fee',
    'name' => 'subcription_fee',
    'default' => false,
    'link' => false,
  ),
  'implementation_fee' => 
  array (
    'width' => '10%',
    'label' => 'Implementation Fee',
    'name' => 'implementation_fee',
    'default' => false,
    'link' => false,
  ),
  'committed' => 
  array (
    'width' => '10%',
    'label' => 'Committed',
    'name' => 'committed',
    'default' => false,
    'link' => false,
  ),
  'start_date' => 
  array (
    'width' => '10%',
    'label' => 'Contract Start Date',
    'name' => 'start_date',
    'default' => false,
    'link' => false,
  ),
  'end_date' => 
  array (
    'width' => '10%',
    'label' => 'Contract End Date',
    'name' => 'end_date',
    'default' => false,
    'link' => false,
  ),
  'finance_contact_person' => 
  array (
    'width' => '10%',
    'label' => 'Finance Contact Person',
    'name' => 'finance_contact_person',
    'default' => false,
    'link' => false,
  ),
  'hiringboss_id' => 
  array (
    'width' => '10%',
    'label' => 'Hiring Boss ID',
    'name' => 'hiringboss_id',
    'default' => false,
    'link' => false,
  ),
  'xero_id' => 
  array (
    'width' => '10%',
    'label' => 'Xero ID',
    'name' => 'xero_id',
    'default' => false,
    'link' => false,
  ),
  'description' => 
  array (
    'width' => '10%',
    'label' => 'Description',
    'name' => 'description',
    'default' => false,
    'link' => false,
  ),
);
