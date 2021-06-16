<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

header('Content-Security-Policy: upgrade-insecure-requests');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
$token = 'AQAAAABVURHVAAcrX9PjNDyAJ0uKsdfsZ_3-sEI';
//https://oauth.yandex.ru/authorize?response_type=token&client_id=f48f9582b4c34b75a077bce29d199ad5
if(isset($_POST)) {

//        $prep_date = date("Y-m-d H:i:s");
    switch (@$_POST['action']) {
        case 'adddate':
            {
                $path = '/Документы/'.$_POST['data']['date'].' ';
                $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/?path=' . $path . ' ');
                curl_setopt($ch, CURLOPT_PUT, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $res = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($res, true);
//                echo json_encode($res, JSON_UNESCAPED_UNICODE);
                if (empty($res['error'])) {
                    $path1 = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . ' ';
                    $ch1 = curl_init('https://cloud-api.yandex.net/v1/disk/resources/?path=' . $path1 . ' ');
                    curl_setopt($ch1, CURLOPT_PUT, true);
                    curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch1, CURLOPT_HEADER, false);
                    $res1 = curl_exec($ch1);
                    curl_close($ch1);
                    $res1 = json_decode($res1, true);
                    if (empty($res1['error'])) {
                        $file = $_FILES;
                        $fileNameCmps = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileNameCmps));
                        $file = md5(time() . $fileName) . '.' . $fileExtension;
                        $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . '/';
                        $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        $res4 = curl_exec($ch);
                        curl_close($ch);
                        $res4 = json_decode($res4, true);
                        echo json_encode($res4, JSON_UNESCAPED_UNICODE);
                    }
                    else{
                        $file = $_FILES;
                        $fileNameCmps = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileNameCmps));
                        $file = md5(time() . $fileName) . '.' . $fileExtension;
                        $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . '/';
                        $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        $res4 = curl_exec($ch);
                        curl_close($ch);
                        $res4 = json_decode($res4, true);
                        echo json_encode($res4, JSON_UNESCAPED_UNICODE);

                    }
                }
                else{
                    $path1 = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . ' ';
                    $ch1 = curl_init('https://cloud-api.yandex.net/v1/disk/resources/?path=' . $path1 . ' ');
                    curl_setopt($ch1, CURLOPT_PUT, true);
                    curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch1, CURLOPT_HEADER, false);
                    $res1 = curl_exec($ch1);
                    curl_close($ch1);
                    $res1 = json_decode($res1, true);
                    if (empty($res1['error'])) {
                        $file = $_FILES;
                        $fileNameCmps = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileNameCmps));
                        $file = md5(time() . $fileName) . '.' . $fileExtension;
                        $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . '/';
                        $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        $res4 = curl_exec($ch);
                        curl_close($ch);
                        $res4 = json_decode($res4, true);
                        echo json_encode($res4, JSON_UNESCAPED_UNICODE);
                    }
                    else{
                        $file = $_FILES;
                        $fileNameCmps = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileNameCmps));
                        $file = md5(time() . $fileName) . '.' . $fileExtension;
                        $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . '/';
                        $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        $res4 = curl_exec($ch);
                        curl_close($ch);
                        $res4 = json_decode($res4, true);
                        echo json_encode($res4, JSON_UNESCAPED_UNICODE);
                    }
                }
            }
        break;
        case 'addfile':
            {
                echo json_encode($_POST['data']['file'], JSON_UNESCAPED_UNICODE);
//                echo $_POST['data']['file'];
//                $file = $_POST['data']['file'];
//                $fileNameCmps = explode(".", $fileName);
//                $fileExtension = strtolower(end($fileNameCmps));
//                $file = md5(time() . $fileName) . '.' . $fileExtension;
//
//                echo $_POST['data']['file'];

// Папка на Яндекс Диске (уже должна быть создана).
//                $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . ' ';

// Запрашиваем URL для загрузки.
//                $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
//                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                curl_setopt($ch, CURLOPT_HEADER, false);
//                $res = curl_exec($ch);
//                curl_close($ch);
//
//                $res = json_decode($res, true);
//                if (empty($res['error'])) {
//// Если ошибки нет, то отправляем файл на полученный URL.
//                    $fp = fopen($file, 'r');
//
//                    $ch = curl_init($res['href']);
//                    curl_setopt($ch, CURLOPT_PUT, true);
//                    curl_setopt($ch, CURLOPT_UPLOAD, true);
//                    curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file));
//                    curl_setopt($ch, CURLOPT_INFILE, $fp);
//                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                    curl_setopt($ch, CURLOPT_HEADER, false);
//                    curl_exec($ch);
//                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//                    curl_close($ch);
//
//                    if ($http_code == 201) {
//                        echo 'Файл успешно загружен.';
//                    } else {
//                        echo 'error2';
//
//                    }
//                }  else {
//                    var_dump($res['error']);
//                }
                // Папка на Яндекс Диске (уже должна быть создана).
//                $path = '/Документы/' . $_POST['data']['date'] . '/' . $_POST['data']['idlaed'] . ' ';
//                // Запрашиваем URL для загрузки.
//                $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/upload?path=' . urlencode($path . basename($file)));
//                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                curl_setopt($ch, CURLOPT_HEADER, false);
//                $res = curl_exec($ch);
//                curl_close($ch);
//                $res = json_decode($res, true);
//                if (empty($res['error'])) {
//                    // Если ошибки нет, то отправляем файл на полученный URL.
//                    $fp = fopen($file, 'r');
//
//                    $ch = curl_init($res['href']);
//                    curl_setopt($ch, CURLOPT_PUT, true);
//                    curl_setopt($ch, CURLOPT_UPLOAD, true);
//                    curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file));
//                    curl_setopt($ch, CURLOPT_INFILE, $fp);
//                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                    curl_setopt($ch, CURLOPT_HEADER, false);
//                    curl_exec($ch);
//                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//                    curl_close($ch);
//
//                    if ($http_code == 201) {
//                        echo 'Файл успешно загружен.';
//                    }
//                }
            }
            break;
        case 'geturl':
            {
//                $path = '/Документы/'.$_POST['data']['date'].' ';
                $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/last-uploaded');

                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token,'Accept: application/json'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $res = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($res, true);
                $name = $res->items[0]->name;
//                echo json_encode($name, JSON_UNESCAPED_UNICODE);
                echo json_encode($res, JSON_UNESCAPED_UNICODE);
            }
            break;
        case 'geturl1':
    {
//                $path = '/Документы/'.$_POST['data']['date'].' ';

        $ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/publish?path='.$_POST['data']['urlup'].' ');
        curl_setopt($ch, CURLOPT_PUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json','Authorization: OAuth ' . $token));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, true);
//                echo json_encode($name, JSON_UNESCAPED_UNICODE);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    break;
    }
}


