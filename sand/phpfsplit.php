<?php


function fsplit($file,$buffer=1024){
    //open file to read
    $file_handle = fopen($file,'r');
    //get file size
    $file_size = filesize($file);
    //no of parts to split
    $parts = 1024 / $buffer;
    
    //store all the file names
    $file_parts = array();
    
    //path to write the final files
    $store_path = "splits/";
    
    //name of input file
    $file_name = basename($file);
    
    for($i=0;$i<$parts;$i++){
        //read buffer sized amount from file
        $file_part = fread($file_handle, $buffer);
        //the filename of the part
        $file_part_path = $store_path.$file_name.".part$i"; // files are attached with parts and number of part
        //open the new file [create it] to write
        $file_new = fopen($file_part_path,'w+');
        //write the part of file
        fwrite($file_new, $file_part);
        //add the name of the file to part list [optional]
        array_push($file_parts, $file_part_path);
        //close the part file handle
        fclose($file_new);
    }    
    //close the main file handle
    
    fclose($file_handle);
    return $file_parts;
}
?>