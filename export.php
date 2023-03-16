<?php 
 
// Load the database configuration file 
include_once 'db.php'; 
 
// Fetch records from database 
$fetchdata=new DB_con();
$sql=$fetchdata->fetchdata();
 
if($sql->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "categories-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('PARENT CATEGORY ID', 'CATEGORY NAME', 'CATEGORY DESCRIPTION', 'STATUS', 'ADDED DATE TIME'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $sql->fetch_assoc()){ 
        $lineData = array($row['parent_id'], $row['category_name'], $row['category_description'], $row['status'], $row['added_datetime']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>