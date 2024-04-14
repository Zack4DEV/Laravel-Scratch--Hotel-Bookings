<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExportData</title>
</head>
<body>
<div id="app">

</div>

    @php
$sqlq = $conn->query("SELECT * FROM roombook")->execute();
$result = $sqlq->fetchAll(PDO::FETCH_ASSOC);
$roombook_record = array();
    foreach( $result as $rows):
    $roombook_record[] = $rows;
    @if(isset($_POST["exportexcelbutton"]))

    $filename = "hotel_roombook_data_".date('Ymd') .".xls";
    $exportdata = header("Content-Type: application/vnd.ms-excel");
    $exportdata = header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn = false;

    @if(!empty($roombook_record))
        foreach($roombook_record as $record):
            @if(!$show_coloumn)
                echo implode("\t",array_keys($record)) . "\n";
                $show_coloumn = true;
            @endif
            echo implode("\t", array_values($record)) . "\n";
        endforeach
    @endif
    echo json_encode([
                    {{ exportdata }} <= $exportdata
                    ]);
    exit;
    @endif
    endforeach

</body>
</html>
