<?php
$csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQO2zR2PgCVwvaDoWLDTFbyNNFP-ddlCJUoE6ut1-SvNe7ft34TsSuNXn8uxrPeNVnAP7biSbDOIeTu/pub?output=csv';

$csvData = file_get_contents($csvUrl);
$rows = explode("\n", $csvData);

$columnData = [];
foreach ($rows as $row) {
    $rowData = str_getcsv($row);
    $columnData[] = $rowData;
}

$headers = array_shift($columnData);
?>
