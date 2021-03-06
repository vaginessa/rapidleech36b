<?php
if (!defined('RAPIDLEECH')) {
	require_once("index.html");
	exit;
}

$default_options = array(
###MAIN-CONFIG
'disableadvanceeditor' => false, //for security reason, so you just can set access manualy
'xpanel_filename' => 'xpanel.php', // u need to allow this file in your htaccess if needed
'index_file' => 'index.php', //set index filename, incase you have a different name instead of index.php
'allowcpanel' => true, // WARNING, set this to FALSE will Disable access to xpanel.
'loginCp' => array('admin' => 'admin'), // user=>pass
'login' => false, // false - Authorization mode is off, true - on
'users' => array('sayur' => 'asem'), // user=>pass
'login_cgi' => false, // true - Will try to workaround CGI authorization

###LIMITATION-CONFIG
//Limit Premium download by ip
'limitbyIP' => false, //limit Premium Account used in download by IP; dont forget chmod 777 to folder tmp
'maximum_free_downloads' => 5, //how many times it'll granted?
'delay_per_ip' => 12, //(in hour) recycle allowable IP
//Limit Free Download by ip
'downloadLimitbyIP' => false, //limit Download RL by IP
'downloadsPerIP' => 5, //how many times it'll granted?
'downloadDelayPerIP' => 3600, //(in second) recycle allowable IP
//Limit Traffics
'limitbytraffic' => false, //limit RL by Traffic Flow
'max_trafic' => 81902, // (in MB). eg: 1 GB = 1 * (1024) MB
'date_trafic' => '14/04/2020', // (d-day traffic quota expired). date in dd/mm/YYYY
'day_reset_trafic' => 1, // auto reset traffic. delay in days;
//Limit geolocation
'limited_edition' => false, // limit authorization RL by ip address (banned and allowd list)
'list_allow_ip' => '127.0.0.1', // White list ip. eg. 111.111.111.111, 255.*.*.*  //--never blank this if you set config["limited_edition"] = true
'list_baned_ip' => '', // blacklist ip, u think so?!. eg. 111.111.111.111, 222.*.*.*, 212.212.212.*
'limited_area' => false, // limit authorization RL by ID Country
'allow_CID' => '', // White list Country ID, blank mean all country is allowed. eg. ID, MY; // allow only Indonesia And Malaysia
'baned_CID' => '', // Blacklist Country ID, blank mean no country is banned. eg. US; // all country from US being banned.
//Limit RL work
'limit_timework' => true, // limit your RL by time. Client's Current time depend on (Server timezone)
'workstart' => '00:00:00', // Your RL start to work
'workend' => '23:59:00', // Your RL end to work
//Limit server load
'limit_cpuload' => false, // limit cpu load and task server job
'ServerLoadAllowed' => 0, // Maximum server load allowed; Disable = 0
'CpuLoadFormat' => ((!function_exists('exec') && !function_exists('shell_exec')) ? $options["CpuLoadFormat"] = 'percent' : 'load'), // Value = 'load' for load format; 'percent' for percent format
'passthru_allowed' => (!function_exists('passthru') ? false : true) OR FALSE, // Does your host allows passthru?
//Limit server storage capacity
'auto_del_time' => 60, //(in minute) delete leeched file
'maxlimitsize' => 0, //(in MB) limit upper-bound of filesize
'minlimitsize' => 0, //(in MB) limit lower-bound of filesize
'storage_limit' => 0, //(in MB) limit your server files storage.  1 * 1024 = 1 GB;

###-FILE CONFIG
'download_dir' => '0x14/', // Your downloaded files are saved here;
'download_dir_is_changeable' => false, // To allow users to change the download dir ( index page )
'maysaveto' => false, // allow users to change downloaded files to saved ( in audl )
'forbidden_filetypes' => array('.htaccess', '.htpasswd', '.php', '.php3', '.php4', '.php5', '.phtml', '.asp', '.aspx', '.cgi'),
'forbidden_filetypes_block' => false, // false - rename forbidden_filetypes, true - completely block them
'rename_these_filetypes_to' => '.xxx', // If forbidden_filetypes_block = false then rename those filetypes to this
'check_these_before_unzipping' => true, // true - Don't allow extraction/creation of these filetypes from file actions
'disable_action' => false, //no action menus
'disable_to' => array(// disabled action files properties
	'act_upload' => false,
	'act_ftp' => false,
	'act_mail' => false,
	'act_boxes' => false,
	'act_split' => false,
	'act_merge' => false,
	'act_md5' => false,
	'act_archive_compression' => false,
	'act_pack' => false,
	'act_zip' => false,
	'act_unzip' => false,
	'act_rar' => false,
	'act_unrar' => false,
	'act_rename' => false,
	'act_mrename' => false,
	'act_delete' => false,
),
'show_column_sfile' => array(// disabled action files properties
	'md5' => false,
	'downloadlink' => true,
	'comments' => false,
	'date' => true,
	'age' => true,
	'ip' => true,
),
'2gb_fix' => true, // true - Try to list files bigger than 2gb on 32 bit o.s.
'show_all' => true, // true - To show all files in the catalog, false to hide it
'bw_save' => true, // Bandwidth Saving

#Auto-Rename #
'rename_prefix' => '', //eg. mysite => mysite_file_name.rar
'rename_suffix' => '', //eg. mysite => file_name_mysite.rar
'rename_underscore' => true, // true, replace spaces for underscores in file names
'add_ext_5city' => '', //eg. ccpb => file_name.rar.ccpb

#View-Config #
'navi_left' => array(
	'showcpanel' => true,
	'showplugins' => true,
	'showaudl' => true,
	'showauul' => true,
	'showlynx' => true,
	'showmtn' => true,
	'server_info' => true,
),
'forbid' => array(
	'audl' => false,
	'auul' => false,
	'lynx' => false,
	'mtn' => false,
),
###-Auto Download-Config
'audl' => 5, //how many link allow to auto-download work ?
'showautoclose' => true, //autoclose popup when leeching in audl
'timeautoclose' => 250,
'autochecklink' => true, // Auto check submited link in audl
'iframealocate' => 5, //how many iframe to allocate in audl for manual method.
'premium_acc_audl' => true, // False - To disable premium account in autodownload
###-Auto Upload-Config
'auul' => 5, //how many file allow to auto-upload work ?
'openwindows' => 5, //how many iframe to allocate in auul
'myuploads_disable' => false, # True - Disable myuploads.txt creation
###-Movie Thumbnailer-Config
'mtn_showconfig' => array(
	'enable' => true,
	'showtext' => true
),
'mtn_colrow' => array(
	'columns' => 3,
	'rows' => 3
),
'mtn_width' => 0,
'mtn_height' => 100,
'mtn_text' => '',
'mtn_suffix' => 's',
'mtn_bgcolor' => '3A9191',
'mtn_quality' => 80,
'mtn_edge' => 0,
'mtn_cuttime' => array(
	'cut' => 1,
	'time' => 'min'
),
'mtn_individualshots' => false,
'mtn_saveinfo' => false,
'mtn_video_options' => array(
	'enable' => false,
	'txtcolor' => 'FFFFFF',
	'txtfont' => 'Tahomabd.ttf',
	'txtsize' => 10,
),
'mtn_time' => array(
	'enable' => false,
	'tshadow' => 'FFFFFF',
	'tcolor' => 'FFFFFF',
),
'mtn_location' => array(
	'info' => 4,
	'time' => 2,
),
'deletelink_in_lynx' => true,
'cpuUsageNFO' => true, // require server_info = true
'OnlineVisitor' => true, //Show Online Visitor
'premix_status' => true, // enable acc premix status
'ip_premixstat_list' => array('127.0.0.1'), // trusted ip, can view detil acc.

###-MISC-CONFIG
'no_cache' => true, // true - Prohibition by Browser; otherwise allowed
'redir' => true, // true - Redirect passive method
'new_window' => false, // false disabled, true use new window
'new_window_js' => true, //  (only used when new_window enabled) true full size window, false javascript window
'use_curl' => false, // true - Will use curl instead stream socket client(especially in ssl connection), disable this if filehost refuse data sended by curl. Need curl exec/extension enable in your server
'compressed_web' => 0, // toogle compressed mode, 0:disable; 1:compress all page source; 2: compress main body only
'upload_html_disable' => false, // true - Disable *.upload.html creation
'disable_ajax' => false, //switch to old method, No-Ajax in Serverfiles
'disable_ajaxren' => false, //toogle ajax instant rename. require: rsajax.js; rsajax_ren.js
'logact' => true, //do log-activity
'alternatefree' => true, //Auto switch freedownload if premium is not good
'enable_stop_transload' => false, //Show stop button while transloading file
'mip_enabled' => false, //If you need to disable multiple ip support, set to false
'mip_arotate' => false, //Auto change to next ip after start transload process
'timezone' => 0, // set Timezone. 0 Mean using time in UTC (GMT+0)
'lang' => 'english', // set Language.
'template_used' => 'default', // set Template for your RL. eg default
'csstype' => '_default', // set Skin/Theme to your RL. eg. _default
);
// End Default Config ------
?>