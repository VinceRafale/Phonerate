<?php
$_SERVER['DOCUMENT_ROOT'] = "/var/www/phonerate.dk/public_html/te1";

class JConfig {
	public $offline = '0';
	public $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'Phonerate.dk';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $access = '1';
	public $debug = '0';
	public $debug_lang = '0';
	public $dbtype = 'mysql';
	public $host = 'mysql22.unoeuro.com:';
	public $user = 'phonerate_dk';
	public $password = 'bestlife2911';
	public $db = 'phonerate_dk_db';
	public $dbprefix = '1jos_';
	public $live_site = '';
	public $secret = 'ETLDOFfxfUXV6iAA';
	public $gzip = '0';
	public $error_reporting = 'default';
	public $helpurl = 'http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '127.0.0.1';
	public $ftp_port = '21';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $offset = 'UTC';
	public $offset_user = 'UTC';
	public $mailer = 'smtp';
	public $mailfrom = 'christoffer.o.nielsen@gmail.com';
	public $fromname = 'Phonerate.dk';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'asmtp.unoeuro.com';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = '0';
	public $cache_handler = 'file';
	public $cachetime = '15';
	public $MetaDesc = '';
	public $MetaKeys = '';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $MetaVersion = '0';
	public $robots = '';
	public $sef = '1';
	public $sef_rewrite = '0';
	public $sef_suffix = '0';
	public $unicodeslugs = '0';
	public $feed_limit = '10';
	public $log_path = '/var/www/phonerate.dk/public_html/te1/logs';
	public $tmp_path = '/var/www/phonerate.dk/public_html/te1/tmp';
	public $lifetime = '15';
	public $session_handler = 'database';
}