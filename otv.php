<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

header('Content-Security-Policy: upgrade-insecure-requests');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
$token = 'AQAAAABVURHVAAcrX9PjNDyAJ0uKsdfsZ_3-sEI';

// Путь и имя файла на нашем сервере.
$fileName = $_POST['ff']['name'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$file = md5(time() . $fileName) . '.' . $fileExtension;

echo $file;

// Папка на Яндекс Диске (уже должна быть создана).
$path = '/test/';

// Запрашиваем URL для загрузки.
$ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_decode($res, true);
if (empty($res['error'])) {
// Если ошибки нет, то отправляем файл на полученный URL.
$fp = fopen($file, 'r');

$ch = curl_init($res['href']);
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_UPLOAD, true);
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file));
curl_setopt($ch, CURLOPT_INFILE, $fp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 201) {
echo 'Файл успешно загружен.';
} else {
echo 'error2';

}
}  else {
var_dump($res['error']);
}