<!DOCTYPE html>
<html>

<head>
    <title>Booking Successful</title>
</head>

<body>
    <div>
        <h1>Booking Successful</h1>
        <h2>Summary of Information</h2>
        <ul>
            <li><strong>Date of Event:</strong> <?php echo $_POST['bdate']; ?></li>
            <li><strong>Time of Event:</strong> <?php echo $_POST['event']; ?></li>
            <li><strong>Select Artist:</strong> <?php echo $_POST['artist']; ?></li>
            <li><strong>Description of Event:</strong> <?php echo $_POST['description']; ?></li>
            <li><strong>Promoter's Name:</strong> <?php echo $_POST['promo']; ?></li>
            <li><strong>Venue Name:</strong> <?php echo $_POST['venue_name']; ?></li>
            <li><strong>Venue Address:</strong> <?php echo $_POST['venue_address_1']; ?> <?php echo $_POST['venue_address_2']; ?>, <?php echo $_POST['city']; ?>, <?php echo $_POST['region']; ?>, <?php echo $_POST['postal']; ?>, <?php echo $_POST['country']; ?></li>
            <li><strong>Venue Capacity:</strong> <?php echo $_POST['capacity']; ?></li>
            <li><strong>Expected Attendance:</strong> <?php echo $_POST['attendance']; ?></li>
            <li><strong>Type of Performance:</strong> <?php echo $_POST['performance']; ?></li>
            <li><strong>Set Time (in minutes):</strong> <?php echo $_POST['time']; ?></li>
            <li><strong>Contact Person:</strong> <?php echo $_POST['contact_firstname']; ?> <?php echo $_POST['contact_lastname']; ?></li>
            <li><strong>Contact Email:</strong> <?php echo $_POST['email']; ?></li>
            <li><strong>Contact Number:</strong> <?php echo $_POST['number']; ?></li>
            <li><strong>Will this event be recorded?</strong> <?php echo $_POST['recorded']; ?></li>
            <li><strong>Your file has been saved !</strong></li>
        </ul>
    </div>
</body>

</html>
