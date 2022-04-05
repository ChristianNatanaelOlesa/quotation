<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=quotation", "root", "");

if($_POST["query"] != '')
{
  $search_array = explode(",", $_POST["query"]);
  $search_text = "'" . implode("', '", $search_array) . "'";
  $query = "SELECT * FROM ms_item WHERE noprospect IN (".$search_text.") ORDER BY noprospect ASC
  ";
}
else
{
  echo'
  <tr>

  </tr>
  ';
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
      <td>'.$row["nopracost"].'</td>
      <td>'.$row["category"].'</td>
      <td>'.$row["type_trafo"].'</td>
      <td>'.$row["service_condition"].'</td>
      <td>'.$row["tipeprospect"].'</td>
    </tr>
    ';
  }
}


else
{
  $output .= '
  <tr>
    <td colspan="5" align="center">No Data Found</td>
  </tr>
  ';
}

echo $output;


?>