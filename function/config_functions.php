<?php

//Konsta App Information
define("VERSION_APP", "0.0.2 Beta");
define("DEVELOPER_TEAM", "IT BLC-Telkom Team");
define("AUTHOR", "Aji Kamaludin");
define("GIT", "http://github.com/ajikamaludin");
define("FB", "http://facebook.com/ajikamaludin19");
define("PATH","getprakerin");
define("ACCESS_FROM",'http://'.$_SERVER['SERVER_NAME'].'/'.PATH);
define("SERVER",$_SERVER['SERVER_NAME']);

//Konsta Google Capcha
if(SERVER == 'localhost'){
	define("SECRET_KEY","6Ldo9fkSAAAAAEmeYapWRYsjGicHUQ46mYys7TAf");
	define("DATA_SITE_KEY","6Ldo9fkSAAAAAG32L-gdfjN7zDpzaShdtEcpTthh");
}elseif(SERVER == '172.20.253.252'){
	define("SECRET_KEY","6LePVRYUAAAAAHbfUgw-PelqBK5KTPHH-aw5BU7h");
	define("DATA_SITE_KEY","6LePVRYUAAAAAEqkT6fNUUHyF9qzxovDhru004E6");
}

//Konsta MySQL/MariaDB Information
define('HOST_URL', "localhost");
define('HOST_USER', "blc");
define('HOST_PASSWORD', "blc");
define('HOST_DB', "dev-prak-blc");

?>
