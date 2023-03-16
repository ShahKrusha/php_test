<?php
// Load the database configuration file
include_once 'db.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $parent_id   = $line[0];
                $category_name  = $line[1];
                $category_description  = $line[2];
                $status  = $line[3];
                $added_datetime = $line[4];
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $con->query("UPDATE categories SET parent_id = '".$parent_id."', category_name = '".$category_name."', category_description = '".$category_description."', status = '".$status."', added_datetime = '".$added_datetime."' ");
                }else{
                    // Insert member data in the database
                    $con->query("INSERT INTO categories (parent_id, category_name, category_description, status, added_datetime) VALUES ('".$parent_id."', '".$category_name."', '".$category_description."','".$status."', NOW() )");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);