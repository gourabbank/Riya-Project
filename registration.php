<?php
// Include the header file
require_once "header.php";

// Include the database connection file
require_once "db_connect.php";

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $shopName = $_POST["shopName"];
    $liveLocation = $_POST["liveLocation"];
    $shopkeeperName = $_POST["shopkeeperName"];
    $email = $_POST["email"];
    $mobileNumber = $_POST["mobileNumber"];
    $password = $_POST["password"];
    $shopType = $_POST["shopType"];
    $itemsDetails = $_POST["itemsDetails"];
    $homeDelivery = isset($_POST["homeDelivery"]) ? "Yes" : "No";

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (shop_name, live_location, shopkeeper_name, email, mobile_number, password, shop_type, items_details, home_delivery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $shopName, $liveLocation, $shopkeeperName, $email, $mobileNumber, $password, $shopType, $itemsDetails, $homeDelivery);

    // Execute the SQL statement
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // For this example, we'll simply display a success message
    echo "<div class='container'>";
    echo "<h2>Registration Successful</h2>";
    echo "<p>Thank you for registering!</p>";
    echo "</div>";

    exit; // Stop further execution after displaying the success message
}
?>

<!-- Registration page content -->
<div class="container">
  <h1>Registration Page</h1>
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div class="form-group">
      <label for="shopName">Shop Name:</label>
      <input type="text" class="form-control" id="shopName" name="shopName" required>
    </div>

    <div class="form-group">
      <label for="liveLocation">Live Location:</label>
      <input type="text" class="form-control" id="liveLocation" name="liveLocation" required>
    </div>

    <div class="form-group">
      <label for="shopkeeperName">Shopkeeper's Name:</label>
      <input type="text" class="form-control" id="shopkeeperName" name="shopkeeperName" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail Id:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="mobileNumber">Mobile Number:</label>
      <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
      <label for="shopType">Shop Type:</label>
      <input type="text" class="form-control" id="shopType" name="shopType" required>
    </div>

    <div class="form-group">
      <label for="itemsDetails">Items Details:</label>
      <textarea class="form-control" id="itemsDetails" name="itemsDetails" required></textarea>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="homeDelivery" name="homeDelivery">
      <label class="form-check-label" for="homeDelivery">Availability of Home-Delivery</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
