<?php
$viewdefs ['Opportunities'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
          ),
          1 => 'date_closed',
        ),
        2 => 
        array (
          0 => 'sales_stage',
          1 => 'opportunity_type',
        ),
        3 => 
        array (
          0 => 'probability',
          1 => 'lead_source',
        ),
        4 => 
        array (
          0 => 'next_step',
          1 => 'campaign_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'opplist_c',
            'studio' => 'visible',
            'label' => 'LBL_OPPLIST',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'q1_c',
            'studio' => 'visible',
            'label' => 'LBL_Q1',
          ),
          1 => 
          array (
            'name' => 'a1_c',
            'label' => 'LBL_A1',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'q2_c',
            'studio' => 'visible',
            'label' => 'LBL_Q2',
          ),
          1 => 
          array (
            'name' => 'a2_c',
            'label' => 'LBL_A2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'q3_c',
            'studio' => 'visible',
            'label' => 'LBL_Q3',
          ),
          1 => 
          array (
            'name' => 'a3_c',
            'label' => 'LBL_A3',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'q4_c',
            'studio' => 'visible',
            'label' => 'LBL_Q4',
          ),
          1 => 
          array (
            'name' => 'a4_c',
            'label' => 'LBL_A4',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'q5_c',
            'studio' => 'visible',
            'label' => 'LBL_Q5',
          ),
          1 => 
          array (
            'name' => 'a5_c',
            'label' => 'LBL_A5',
          ),
        ),
      ),
    ),
  ),
);
?>
