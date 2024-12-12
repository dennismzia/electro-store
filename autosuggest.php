<?php
  //include constants file to use constant variables like SITEURL
  include('config/constants.php');
  //include componets file to access product card function

  // Check if the query parameter is set
  if(isset($_POST["query"])) {
    // Get the query from the AJAX request
    $query = $_POST["query"];
    // Connect to the database and execute a query to fetch suggestions
    $sql = "SELECT * FROM `tbl_products` 
        WHERE `product_name` LIKE '%$query%' 
        OR `category_name` lIKE '%$query%' 
        OR `short_description` LIKE '%$query%' 
        OR`long_description` LIKE '%$query%'";

    $result = mysqli_query($conn, $sql);
    // Build an array of suggestions from the query results
    $suggestions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row["product_name"];
    }

    // Send the response as JSON data
    header("Content-type: application/json");
    echo json_encode($suggestions);
  } else {
    // Return an error message if the query parameter is not set
    echo "Error: Query parameter is not set";
  }
  // Exit the script to prevent any additional output
  exit();
?>
