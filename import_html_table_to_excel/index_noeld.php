<?php

function getFields() {
    $columns = array(
        'id' => 'visible'
        ,'name' => 'visible'
        ,'username' => 'visible'
        ,'isadmin'=>'visible'
    );
    return $columns;
}

function getData($sql, $db_handle) {
// Get data from a mysql database:

    if (func_num_args() == 2) {
        $result = mysql_query($sql, $db_handle);
    } else {
        global $db;
        if (isset($db)) {
            $db_handle = $db;
            $result = mysql_query($sql, $db_handle);
        } else {
            $result = mysql_query($sql);
        }
    }

    $table = array();
    if (mysql_num_rows($result) > 0) {
        $i = 0;
        while ($table[$i] = mysql_fetch_assoc($result))
            $i++;
        unset($table[$i]);
    }

// clean up:                 
    mysql_free_result($result);

    return $table;
}

// endFunction getData

$db_handle = mysql_connect('localhost', 'root', '');
$sql = "SELECT * FROM dbnoel.users";
$data = getData($sql, $db_handle);

if (isset($_POST["ExportType"])) {
    switch ($_POST["ExportType"]) {
        case "export-to-excel" :
            // Submission from
            $filename = $_POST["ExportType"] . ".xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            ExportFile($data);
            //$_POST["ExportType"] = '';
            exit();
        case "export-to-csv" :
            // Submission from
            $filename = $_POST["ExportType"] . ".csv";
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Expires: 0");
            ExportCSVFile($data);
            //$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : " . $_POST["action"]);
            break;
    }
}

function ExportCSVFile($records) {
    // create a file pointer connected to the output stream
    $fh = fopen('php://output', 'w');
    $heading = false;
    if (!empty($records))
        foreach ($records as $row) {
            if (!$heading) {
                // output the column headings
                fputcsv($fh, array_keys($row));
                $heading = true;
            }
            // loop over the rows, outputting them
            fputcsv($fh, array_values($row));
        }
    fclose($fh);
}

function ExportFile($records) {
    $heading = false;
    if (!empty($records))
        foreach ($records as $row) {
            if (!$heading) {
                // display field/column names as a first row
                echo implode("\t", array_keys($row)) . "\n";
                $heading = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    exit;
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<style type="text/css">
    .container{
        margin-top: 20px;
    }
</style>

<title>KodeInfo.com : Export to excel or CSV file</title>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="panel panel-default">
                <div class="panel-heading">				
                    <h3 class="panel-title" style="line-height:35px;">Source code : PHP export to Excel or CSV file  <div class="btn-group pull-right">
                            <button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="export-menu">
                                <li id="export-to-excel"><a href="#">Export to excel</a></li>
                                <li id="export-to-csv"><a href="#">Export to csv</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Other</a></li>
                            </ul>
                        </div>
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="index_noeld.php" method="post" id="export-form">
                        <input type="hidden" value='' id='hidden-type' name='ExportType'/>
                    </form>

                    <table id="" class="table table-striped table-bordered">
                        <tr>
                            
                            <?php 
                            $columns = getFields();
                            foreach($columns as $key=>$val) { ?>
                            <th><?php echo $key; ?></th>
                            <?php } ?>
                            <!--<th>Yes/No</th>-->
                            
                        </tr>

                        <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr>
                                    <?php foreach ($columns as $key=>$val) { ?>
                                    <td><?php echo $row [$key]; ?></td>
                                    
                                    <?php } ?>
                                    <!--<td><input type="checkbox"></td>-->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script  type="text/javascript">
    $(document).ready(function () {

        jQuery('#export-menu li').bind("click", function () {
            var target = $(this).attr('id');
            switch (target) {
                case 'export-to-excel' :
                    $('#hidden-type').val(target);
                    //alert($('#hidden-type').val());
                    $('#export-form').submit();
                    $('#hidden-type').val('');
                    break
                case 'export-to-csv' :
                    $('#hidden-type').val(target);
                    //alert($('#hidden-type').val());
                    $('#export-form').submit();
                    $('#hidden-type').val('');
                    break
            }
        });
    });
</script>