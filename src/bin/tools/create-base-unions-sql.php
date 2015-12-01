<?php

function gen_uuid($len=8) {
    $hex = md5("summerfields_1864" . uniqid("", true));
    $pack = pack('H*', $hex);
    $uid = base64_encode($pack);        // max 22 chars
    $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $uid);    // mixed case
    if ($len<4) $len=4;
    if ($len>128) $len=128;                       // prevent silliness, can remove
    while (strlen($uid)<$len) $uid = $uid . gen_uuid(22);     // append until length achieved
    return substr($uid, 0, $len);
}
$pupils = gen_uuid();
$xmlview = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Union xmlns=\"urn:com:summerfields:Archive:Unions\"><ID>$pupils</ID><name>pupils</name><comments>All pupils</comments></Union>";
$sql = "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES (\"".$pupils."\",\"union\",\"".sha1("pupils")."\",\"".mysql_escape_string($xmlview)."\");\n";
$sql .= "INSERT INTO `unions_keys` (unionId,name) VALUES (\"".$pupils."\",\"pupils\");\n";

$teachers = gen_uuid();
$xmlview = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Union xmlns=\"urn:com:summerfields:Archive:Unions\"><ID>$teachers</ID><name>teachers</name><comments>All teachers</comments></Union>";
$sql .= "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES (\"".$teachers."\",\"union\",\"".sha1("teachers")."\",\"".mysql_escape_string($xmlview)."\");";
$sql .= "INSERT INTO `unions_keys` (unionId,name) VALUES (\"".$teachers."\",\"teachers\");\n";

$support = gen_uuid();
$xmlview = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Union xmlns=\"urn:com:summerfields:Archive:Unions\"><ID>$support</ID><name>support</name><comments>All support staff</comments></Union>";
$sql .= "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES (\"".$support."\",\"union\",\"".sha1("support")."\",\"".mysql_escape_string($xmlview)."\");";
$sql .= "INSERT INTO `unions_keys` (unionId,name) VALUES (\"".$support."\",\"support\");\n";

$admin = gen_uuid();
$xmlview = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Union xmlns=\"urn:com:summerfields:Archive:Unions\"><ID>$admin</ID><name>admin</name><comments>All admin persons</comments></Union>";
$sql .= "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES (\"".$admin."\",\"union\",\"".sha1("admin")."\",\"".mysql_escape_string($xmlview)."\");";
$sql .= "INSERT INTO `unions_keys` (unionId,name) VALUES (\"".$admin."\",\"admin\");\n";

$maintenance = gen_uuid();
$xmlview = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Union xmlns=\"urn:com:summerfields:Archive:Unions\"><ID>$maintenance</ID><name>maintenance</name><comments>All maintenance persons</comments></Union>";
$sql .= "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES (\"".$maintenance."\",\"union\",\"".sha1("maintenance")."\",\"".mysql_escape_string($xmlview)."\");";
$sql .= "INSERT INTO `unions_keys` (unionId,name) VALUES (\"".$maintenance."\",\"maintenance\");\n";

file_put_contents("../sql/base-unions.sql", $sql);