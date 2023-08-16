<!DOCTYPE html>
<html>

<head>
    <title>Data dari Google Sheets</title>
    <!-- Tambahkan link Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Data dari Google Sheets</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php
                    $csvUrl = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQO2zR2PgCVwvaDoWLDTFbyNNFP-ddlCJUoE6ut1-SvNe7ft34TsSuNXn8uxrPeNVnAP7biSbDOIeTu/pub?output=csv';

                    $csvData = file_get_contents($csvUrl);
                    $rows = explode("\n", $csvData);

                    $columnData = [];
                    foreach ($rows as $row) {
                        $rowData = str_getcsv($row);
                        $columnData[] = $rowData;
                    }

                    // Assuming first row contains column headers
                    $headers = array_shift($columnData);
                    ?>
                    <?php foreach ($headers as $header) { ?>
                    <th><?php echo $header; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($columnData as $row) { ?>
                <tr>
                    <?php foreach ($row as $cell) { ?>
                    <td><?php echo $cell; ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Tambahkan link Bootstrap JS di sini -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>