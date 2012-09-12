<?php
// created: 2012-09-07 07:28:36
$GLOBALS["dictionary"]["KReport"] = array (
  'table' => 'kreports',
  'edition' => 'basic',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'required' => true,
      'importable' => 'required',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'kreports_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'kreports_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'kreports_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'report_module' => 
    array (
      'name' => 'report_module',
      'type' => 'enum',
      'options' => 'moduleList',
      'len' => '25',
      'vname' => 'LBL_MODULE',
      'massupdate' => false,
    ),
    'report_status' => 
    array (
      'name' => 'report_status',
      'type' => 'enum',
      'options' => 'kreportstatus',
      'len' => '1',
      'vname' => 'LBL_REPORT_STATUS',
    ),
    'report_source' => 
    array (
      'name' => 'report_source',
      'type' => 'varchar',
      'len' => '30',
      'vname' => 'LBL_REPORT_SOURCE',
    ),
    'union_modules' => 
    array (
      'name' => 'union_modules',
      'type' => 'text',
    ),
    'reportoptions' => 
    array (
      'name' => 'reportoptions',
      'type' => 'text',
      'vname' => 'LBL_REPORTOPTIONS',
    ),
    'listtype' => 
    array (
      'name' => 'listtype',
      'type' => 'varchar',
      'len' => '10',
      'vname' => 'LBL_LISTTYPE',
      'massupdate' => false,
    ),
    'listtypeproperties' => 
    array (
      'name' => 'listtypeproperties',
      'type' => 'text',
    ),
    'selectionlimit' => 
    array (
      'name' => 'selectionlimit',
      'type' => 'varchar',
      'len' => '25',
      'vname' => 'LBL_SELECTIONLIMIT',
      'massupdate' => false,
    ),
    'pdforientation' => 
    array (
      'name' => 'pdforientation',
      'type' => 'varchar',
      'len' => '10',
      'vname' => 'LBL_PDFORIENTATION',
      'massupdate' => false,
    ),
    'pdfoptions' => 
    array (
      'name' => 'pdfoptions',
      'type' => 'text',
      'vname' => 'LBL_PDFOPTIONS',
      'massupdate' => false,
    ),
    'values_column' => 
    array (
      'name' => 'values_column',
      'type' => 'varchar',
      'len' => '25',
      'vname' => 'LBL_VALUES',
      'massupdate' => false,
    ),
    'values_function' => 
    array (
      'name' => 'values_function',
      'type' => 'multienum',
      'options' => 'value_functions',
      'vname' => 'LBL_VALUES_FUNCTION',
      'massupdate' => false,
    ),
    'categories' => 
    array (
      'name' => 'categories',
      'type' => 'varchar',
      'len' => '25',
      'vname' => 'LBL_CATEGORIES',
      'massupdate' => false,
    ),
    'chart_layout' => 
    array (
      'name' => 'chart_layout',
      'type' => 'varchar',
      'len' => '6',
      'vname' => 'LBL_CHART_LAYOUTS',
      'massupdate' => false,
    ),
    'chart_params' => 
    array (
      'name' => 'chart_params',
      'type' => 'text',
      'vname' => 'LBL_CHART_PARAMS',
    ),
    'chart_params_new' => 
    array (
      'name' => 'chart_params_new',
      'type' => 'text',
      'vname' => 'LBL_CHART_PARAMS',
    ),
    'chart_height' => 
    array (
      'name' => 'chart_height',
      'type' => 'varchar',
      'len' => '4',
      'vname' => 'LBL_CHART_HEIGHT',
    ),
    'wheregroups' => 
    array (
      'name' => 'wheregroups',
      'type' => 'text',
      'vname' => 'LBL_WHEREGROUPS',
      'default' => '[]',
    ),
    'whereconditions' => 
    array (
      'name' => 'whereconditions',
      'type' => 'text',
      'vname' => 'LBL_WHERECONDITION',
      'default' => '[]',
    ),
    'listfields' => 
    array (
      'name' => 'listfields',
      'type' => 'text',
      'vname' => 'LBL_LISTFIELDS',
    ),
    'unionlistfields' => 
    array (
      'name' => 'unionlistfields',
      'type' => 'text',
      'vname' => 'LBL_UNIONLISTFIELDS',
    ),
    'field_tree' => 
    array (
      'name' => 'field_tree',
      'source' => 'non-db',
    ),
    'mapoptions' => 
    array (
      'name' => 'mapoptions',
      'type' => 'text',
      'vname' => 'LBL_MAPOPTIONS',
    ),
    'publishoptions' => 
    array (
      'name' => 'publishoptions',
      'type' => 'text',
      'vname' => 'LBL_PUBLISHOPTIONS',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'kreportspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_reminder_name',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
      ),
    ),
  ),
  'optimistic_locking' => true,
  'relationships' => 
  array (
    'kreports_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'KReports',
      'rhs_table' => 'kreports',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'kreports_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'KReports',
      'rhs_table' => 'kreports',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'kreports_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'KReports',
      'rhs_table' => 'kreports',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);
?>
