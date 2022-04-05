<?php
if(isset($_POST["segment"])){
    // Capture selected segment
    $segment = $_POST["segment"];
     
    // Define segment and city array
    $segmentArr = array(
                    "SEGMENT 1" => array("SUB SEGMENT A", "SUB SEGMENT B", "SUB SEGMENT C"),
                    "SEGMENT 2" => array("SUB SEGMENT D", "SUB SEGMENT E", "SUB SEGMENT F"),
                    "SEGMENT 3" => array("SUB SEGMENT G", "SUB SEGMENT H", "SUB SEGMENT I")
                );
     
    // Display city dropdown based on segment name
    if($segment !== 'Select'){
        echo "<label>-- Select Segment --</label>";
        echo "<select>";
        foreach($segmentArr[$segment] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
    } 
}
?>