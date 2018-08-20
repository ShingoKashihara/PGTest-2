<?php
require_once 'vendor/autoload.php';
require_once 'Config/google.php';

try {
    $client = new Google_Client();
    $client->setApplicationName('pg-test');
    $client->setDeveloperKey(GOOGLE_API_KEY);

    $service = new Google_Service_Sheets($client);

    // A1:E6 の範囲を取得
    $response = $service->spreadsheets_values->get(SPREADSHEET_ID, 'sales!A1:E6');
    foreach ($response->getValues() as $index => $cols) {
        echo sprintf("'"."%s"."'", implode("','", $cols)).PHP_EOL;
    }
}catch(Exception $e){
    echo $e->getMessage();
}

