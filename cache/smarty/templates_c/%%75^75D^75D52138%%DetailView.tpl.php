<?php /* Smarty version 2.6.11, created on 2012-09-06 06:46:49
         compiled from modules/Users/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'modules/Users/DetailView.tpl', 41, false),)), $this); ?>
<!--
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 ********************************************************************************/
-->
<script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Users/DetailView.js'), $this);?>
'></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type='text/javascript'>
var LBL_NEW_USER_PASSWORD = '<?php echo $this->_tpl_vars['MOD']['LBL_NEW_USER_PASSWORD_2']; ?>
';
<?php if (! empty ( $this->_tpl_vars['ERRORS'] )):  echo '
YAHOO.SUGAR.MessageBox.show({title: \'';  echo $this->_tpl_vars['ERROR_MESSAGE'];  echo '\', msg: \'';  echo $this->_tpl_vars['ERRORS'];  echo '\'} );
'; ?>

<?php endif; ?>
</script>

<script type="text/javascript">
var user_detailview_tabs = new YAHOO.widget.TabView("user_detailview_tabs");

<?php echo '
user_detailview_tabs.on(\'contentReady\', function(e){
'; ?>

});
</script> 

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="actionsContainer">
<tr>
<td>

<form action="index.php" method="post" name="DetailView" id="form">
    <input type="hidden" name="module" value="Users">
    <input type="hidden" name="record" value="<?php echo $this->_tpl_vars['ID']; ?>
">
    <input type="hidden" name="isDuplicate" value=false>
    <input type="hidden" name="action">
    <input type="hidden" name="user_name" value="<?php echo $this->_tpl_vars['USER_NAME']; ?>
">
    <input type="hidden" name="password_generate">
    <input type="hidden" name="old_password">
    <input type="hidden" name="new_password">
    <input type="hidden" name="return_module">
    <input type="hidden" name="return_action">
    <input type="hidden" name="return_id">
<table width="100%" cellpadding="0" cellspacing="0" border="0">

    <tr><td colspan='2' width="100%" nowrap><?php echo $this->_tpl_vars['BUTTONS']; ?>
</td></tr>
</table>
</form>

</td>
<td width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</table>
</td>
</tr>
</table>
<div id="user_detailview_tabs" class="yui-navset detailview_tabs">
    <ul class="yui-nav">
        <li class="selected"><a id="tab1" href="#tab1"><em><?php echo $this->_tpl_vars['MOD']['LBL_USER_INFORMATION']; ?>
</em></a></li>
        <li <?php if ($this->_tpl_vars['IS_GROUP_OR_PORTAL'] == 1): ?>style="display: none;"<?php endif; ?>><a id="tab2" href="#tab2"><em><?php echo $this->_tpl_vars['MOD']['LBL_ADVANCED']; ?>
</em></a></li>
        <?php if ($this->_tpl_vars['SHOW_ROLES']): ?>
        <li><a id="tab3" href="#tab3"><em><?php echo $this->_tpl_vars['MOD']['LBL_USER_ACCESS']; ?>
</em></a></li>
        <?php endif; ?>
    </ul>            
    <div class="yui-content">
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                <tr>
                    <td width="15%" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_NAME']; ?>
:</slot></td>
                    <td width="35%" valign="top"><slot><?php echo $this->_tpl_vars['FULL_NAME']; ?>
&nbsp;</slot></td>
                    <td width="15%" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_NAME']; ?>
:</slot></td>
                    <td width="35%" valign="top"><slot><?php echo $this->_tpl_vars['USER_NAME']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_STATUS']; ?>
:</slot></td>
                    <td valign="top"><slot><?php echo $this->_tpl_vars['STATUS']; ?>
&nbsp;</slot></td>
                    <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_TYPE']; ?>
:</slot></td>
                    <td valign="top" ><slot><?php echo $this->_tpl_vars['USER_TYPE_LABEL']; ?>
&nbsp;</slot></td>
                </tr>
            </table>
            
            <div id='information'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                <tr>
                <th colspan='4' align="left" width="100%" valign="top"><h4><slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_INFORMATION']; ?>
</slot></h4></th>
                </tr><tr>
                <td width="15%" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_EMPLOYEE_STATUS']; ?>
:</slot></td>
                <td width="35%" valign="top"><slot><?php echo $this->_tpl_vars['EMPLOYEE_STATUS']; ?>
&nbsp;</slot></td>
                <td valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td valign="top"><slot>&nbsp;</slot></td>
                </tr><tr>
                <td width="15%" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_TITLE']; ?>
:</slot></td>
                <td width="35%" valign="top"><slot><?php echo $this->_tpl_vars['TITLE']; ?>
&nbsp;</slot></td>
                <td width="15%" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_OFFICE_PHONE']; ?>
:</slot></td>
                <td width="35%" valign="top"><slot><?php echo $this->_tpl_vars['PHONE_WORK']; ?>
&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_DEPARTMENT']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['DEPARTMENT']; ?>
&nbsp;</slot></td>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_MOBILE_PHONE']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['PHONE_MOBILE']; ?>
&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_REPORTS_TO']; ?>
:</slot></td>
                <td valign="top"><slot><a href="index.php?module=Users&action=DetailView&record=<?php echo $this->_tpl_vars['REPORTS_TO_ID']; ?>
"><?php echo $this->_tpl_vars['REPORTS_TO_NAME']; ?>
</a>&nbsp;</slot></td>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_OTHER']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['PHONE_OTHER']; ?>
&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td valign="top"><slot>&nbsp;</slot></td>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_FAX']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['PHONE_FAX']; ?>
&nbsp;</slot></td>
                </tr><tr>
            
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_HOME_PHONE']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['PHONE_HOME']; ?>
&nbsp;</slot></td>
                <td valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td valign="top"><slot>&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_MESSENGER_TYPE']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['MESSENGER_TYPE']; ?>
&nbsp;</slot></td>
                <td valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td valign="top"><slot>&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_MESSENGER_ID']; ?>
:</slot></td>
                <td valign="top"><slot><?php echo $this->_tpl_vars['MESSENGER_ID']; ?>
&nbsp;</slot></td>
                <td valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td valign="top"><slot>&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_ADDRESS']; ?>
:</slot></td>
                <td valign="top" ><slot><?php echo $this->_tpl_vars['ADDRESS_STREET']; ?>
<br>
                <?php echo $this->_tpl_vars['ADDRESS_CITY']; ?>
 <?php echo $this->_tpl_vars['ADDRESS_STATE']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['ADDRESS_POSTALCODE']; ?>
<br>
                <?php echo $this->_tpl_vars['ADDRESS_COUNTRY']; ?>
</slot></td>
                <td scope="row"><slot>&nbsp;</slot></td>
                <td><slot>&nbsp;</slot></td>
                </tr><tr>
                <td valign="top" valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_NOTES']; ?>
:</slot></td>
                <td><slot><?php echo $this->_tpl_vars['DESCRIPTION']; ?>
&nbsp;</slot></td>
                <td width="15%" valign="top" scope="row"><slot>&nbsp;</slot></td>
                <td width="35%" valign="top"><slot>&nbsp;</slot></td>
            </tr></table>
            </div>
            
            <div id='email_options'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                    <tr>
                        <th align="left" scope="row" colspan="4">
                            <h4><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_OPTIONS_TITLE']; ?>
</h4>
                        </th>
                    </tr>
                    <tr>
                        <td align="top" scope="row" width="15%">
                            <?php echo $this->_tpl_vars['MOD']['LBL_EMAIL']; ?>
:
                        </td>
                        <td align="top" width="85%">
                            <?php echo $this->_tpl_vars['EMAIL_OPTIONS']; ?>

                        </td>
                    </tr>
                    <tr id="email_options_link_type">
                        <td align="top"  scope="row">
                            <?php echo $this->_tpl_vars['MOD']['LBL_EMAIL_LINK_TYPE']; ?>
:
                        </td>
                        <td >
                            <?php echo $this->_tpl_vars['EMAIL_LINK_TYPE']; ?>

                        </td>
                    </tr>
                    <?php if ($this->_tpl_vars['SHOW_SMTP_SETTINGS']): ?>
                    <tr>
                        <td scope="row" width="15%">
                            <?php echo $this->_tpl_vars['MOD']['LBL_EMAIL_PROVIDER']; ?>
:
                        </td>
                        <td width="35%">
                            <?php echo $this->_tpl_vars['MAIL_SMTPDISPLAY']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td align="top"  scope="row">
                            <?php echo $this->_tpl_vars['MOD']['LBL_MAIL_SMTPUSER']; ?>
:
                        </td>
                        <td width="35%">
                            <?php echo $this->_tpl_vars['MAIL_SMTPUSER']; ?>

                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <div>
        <div id="settings">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                <tr>
                <th colspan='4' align="left" width="100%" valign="top"><h4><slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_SETTINGS']; ?>
</slot></h4></th>
                </tr>
                <tr>
                <td scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_RECEIVE_NOTIFICATIONS']; ?>
:</slot></td>
                <td><slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['RECEIVE_NOTIFICATIONS']; ?>
></slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_RECEIVE_NOTIFICATIONS_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                <td scope="row" valign="top"><slot><?php echo $this->_tpl_vars['MOD']['LBL_REMINDER']; ?>
:</td>
                <td valign="top" nowrap><slot><input name='should_remind' tabindex='1' size='2' maxlength='2'  disabled type="checkbox" class="checkbox" value='1' <?php echo $this->_tpl_vars['REMINDER_CHECKED']; ?>
>&nbsp;<?php echo $this->_tpl_vars['REMINDER_TIME']; ?>
</slot></td>
                <td ><slot><?php echo $this->_tpl_vars['MOD']['LBL_REMINDER_TEXT']; ?>
&nbsp;</slot></td>
            
                </tr>
                <tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_MAILMERGE']; ?>
:</slot></td>
                <td valign="top" nowrap><slot><input tabindex='3' name='mailmerge_on' disabled class="checkbox" type="checkbox" <?php echo $this->_tpl_vars['MAILMERGE_ON']; ?>
></slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_MAILMERGE_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                <td valign="top" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS_URL']; ?>
:</slot></td>
                <td valign="top" nowrap><slot><?php echo $this->_tpl_vars['SETTINGS_URL']; ?>
</slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS_URL_DESC']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                <td scope="row" valign="top"><slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_DELIMITER']; ?>
:</slot></td>
                <td><slot><?php echo $this->_tpl_vars['EXPORT_DELIMITER']; ?>
</slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_DELIMITER_DESC']; ?>
</slot></td>
                </tr>
                <tr>
                <td scope="row" valign="top"><slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_CHARSET']; ?>
:</slot></td>
                <td><slot><?php echo $this->_tpl_vars['EXPORT_CHARSET']; ?>
</slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_CHARSET_DESC']; ?>
</slot></td>
                </tr>
                <tr>
                <td scope="row" valign="top"><slot><?php echo $this->_tpl_vars['MOD']['LBL_USE_REAL_NAMES']; ?>
:</slot></td>
                <td><slot><?php echo $this->_tpl_vars['USE_REAL_NAMES']; ?>
</slot></td>
                <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_USE_REAL_NAMES_DESC']; ?>
</slot></td>
                </tr>
                <?php echo $this->_tpl_vars['EXTERNAL_AUTH']; ?>

            </table>
        </div>
        
        <div id='locale'>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                <tr>
                    <th colspan='4' align="left" width="100%" valign="top">
                        <h4><slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_LOCALE']; ?>
</slot></h4></th>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_DATE_FORMAT']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['DATEFORMAT']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_DATE_FORMAT_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_TIME_FORMAT']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['TIMEFORMAT']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_TIME_FORMAT_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_TIMEZONE']; ?>
:</slot></td>
                    <td nowrap><slot><?php echo $this->_tpl_vars['TIMEZONE']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_ZONE_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['CURRENCY']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_TEXT']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_SIG_DIGITS']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['CURRENCY_SIG_DIGITS']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_SIG_DIGITS_DESC']; ?>
&nbsp;</slot></td>
                </tr>
                <tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_NUMBER_GROUPING_SEP']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['NUM_GRP_SEP']; ?>
&nbsp;</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_NUMBER_GROUPING_SEP_TEXT']; ?>
&nbsp;</slot></td>
                </tr><tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_DECIMAL_SEP']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['DEC_SEP']; ?>
&nbsp;</slot></td>
                    <td><slot></slot><?php echo $this->_tpl_vars['MOD']['LBL_DECIMAL_SEP_TEXT']; ?>
&nbsp;</td>
                </tr>
                </tr><tr>
                    <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_LOCALE_DEFAULT_NAME_FORMAT']; ?>
:</slot></td>
                    <td><slot><?php echo $this->_tpl_vars['NAME_FORMAT']; ?>
&nbsp;</slot></td>
                    <td><slot></slot><?php echo $this->_tpl_vars['MOD']['LBL_LOCALE_NAME_FORMAT_DESC']; ?>
&nbsp;</td>
                </tr>
            </table>
        </div>
        
        
        <div id='calendar_options'>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
            <tr>
            <th colspan='4' align="left" width="100%" valign="top"><h4><slot><?php echo $this->_tpl_vars['MOD']['LBL_CALENDAR_OPTIONS']; ?>
</slot></h4></th>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_PUBLISH_KEY']; ?>
:</slot></td>
            <td width="20%"><slot><?php echo $this->_tpl_vars['CALENDAR_PUBLISH_KEY']; ?>
&nbsp;</slot></td>
            <td width="65%"><slot><?php echo $this->_tpl_vars['MOD']['LBL_CHOOSE_A_KEY']; ?>
&nbsp;</slot></td>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><nobr><?php echo $this->_tpl_vars['MOD']['LBL_YOUR_PUBLISH_URL']; ?>
:</nobr></slot></td>
            <td colspan=2><slot><?php echo $this->_tpl_vars['CALENDAR_PUBLISH_URL']; ?>
</slot></td>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_SEARCH_URL']; ?>
:</slot></td>
            <td colspan=2><slot><?php echo $this->_tpl_vars['CALENDAR_SEARCH_URL']; ?>
</slot></td>
            </tr>
            </table>
        </div>
        <div id='edit_tabs'>
            <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="detail view">
            <tr>
            <th colspan='4' align="left" width="100%" valign="top"><h4><slot><?php echo $this->_tpl_vars['MOD']['LBL_LAYOUT_OPTIONS']; ?>
</slot></h4></th>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_USE_GROUP_TABS']; ?>
:</slot></td>
            <td><slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['USE_GROUP_TABS']; ?>
></slot></td>
            <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_NAVIGATION_PARADIGM_DESCRIPTION']; ?>
&nbsp;</slot></td>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_MAX_TAB']; ?>
:</slot></td>
            <td width="15%"><slot><?php echo $this->_tpl_vars['MAX_TAB']; ?>
&nbsp;</slot></td>
            <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_MAX_TAB_DESCRIPTION']; ?>
&nbsp;</slot></td>
            </tr>
            <tr>
            <td width="15%" scope="row"><slot><?php echo $this->_tpl_vars['MOD']['LBL_SUBPANEL_TABS']; ?>
:</slot></td>
            <td><slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['SUBPANEL_TABS']; ?>
></slot></td>
            <td><slot><?php echo $this->_tpl_vars['MOD']['LBL_SUBPANEL_TABS_DESCRIPTION']; ?>
&nbsp;</slot></td>
            </tr>
            </table>
        </div>
        <div id="user_holidays">
        <?php echo $this->_tpl_vars['USER_HOLIDAYS_SUBPANEL']; ?>

        </div>
    </div>
<?php if (! $this->_tpl_vars['SHOW_ROLES']): ?>
</div>
<?php endif; ?>