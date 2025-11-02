<?php

include_once '../../backend/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid event ID";
    exit();
}

$event_id = $_GET['id'];

$sql = "SELECT * FROM events WHERE id = $event_id";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error fetching event data: " . mysqli_error($con);
    exit();
}

if (mysqli_num_rows($result) == 0) {
    echo "Event not found";
    exit();
}


$event_data = mysqli_fetch_assoc($result);

// wen user hits submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "UPDATE events SET name='$name', description='$description', date='$date' WHERE id=$event_id";

    if (mysqli_query($con, $sql)) {
        echo "Event data updated successfully";
        exit();
    } else {
        echo "Error updating event data: " . mysqli_error($con);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>
<body>
    <h2>Update Event</h2>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $event_data['name']; ?>"><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $event_data['description']; ?></textarea><br><br>
        
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $event_data['date']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
