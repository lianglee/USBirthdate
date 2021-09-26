<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
function us_birthdate_format(){
		ossn_extend_view('css/ossn.default', 'usbirthdate/css');
		ossn_extend_view('js/opensource.socialnetwork', 'usbirthdate/main.js');
		
		ossn_extend_view('forms/signup', 'usbirthdate/js');
		ossn_extend_view('forms/OssnProfile/edit', 'usbirthdate/js');	
		ossn_register_callback('action', 'load', 'us_format_date_check');
}
function us_format_date_check($callback, $type, $params) {
		$date      = input('birthdate');
		if(isset($params['action'])) {
				if($params['action'] == 'user/register') {
						$ex = explode('/', $date);
						//restore it in system required format
						ossn_set_input('birthdate', "{$ex[1]}/{$ex[0]}/{$ex[2]}");
				}
				if($params['action'] == 'profile/edit'){
						//take care of old format
						$user = ossn_user_by_username(input('username'));
						if($user->birthdate != $date){
							$ex = explode('/', $date);
							//restore it in system required format
							ossn_set_input('birthdate', "{$ex[1]}/{$ex[0]}/{$ex[2]}");						
						}
				}
		}
}
ossn_register_callback('ossn', 'init', 'us_birthdate_format', 999);
