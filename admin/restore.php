<?php
    // Thay đổi các thông tin kết nối phù hợp với cài đặt của bạn
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'shop_db';

    // Function
    function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
        // Connect & select the database
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

        // Temporary variable, used to store current query
        $templine = '';
        
        // Read in entire file
        $lines = file($filePath);
        
        $error = '';
        
        $dropDB = 'DROP DATABASE IF EXISTS `' . $dbName . '`;';
        if (!$db->query($dropDB)) {
            $error .= 'Error performing query ' . $dropDB . ': '. $db->error ;
        } else {
            // Loop through each line
            foreach ($lines as $line){
                if(substr($line, 0, 2) == '--' || $line == ''){
                    continue;
                }
                
                // Add this line to the current segment
                $templine .= $line;
                
                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';'){
                    // Perform the query
                    if(!$db->query($templine)){
                        $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
                    }
                    
                    // Reset temp variable to empty
                    $templine = '';
                }
            }
        }

        return !empty($error)?$error:true;
    }
?>