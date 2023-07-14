<!DOCTYPE html>
<html>

<head>
    <title>Entertainment Booking Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="testbox">
        <form action="./form.php" method="POST" enctype="multipart/form-data">
            <div class="banner">
                <h1>Entertainment Booking Form</h1>
            </div>
            <?php if (!empty($errors)) : ?>
            <ul class="liste-erreurs">
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
            <div class="item">
                <p>Date of Event</p>
                <input type="date" name="bdate" value="<?php echo isset($_POST['bdate']) ? $_POST['bdate'] : ''; ?>" />
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="item">
                <p>Time of Event</p>
                <input type="time" name="event" value="<?php echo isset($_POST['event']) ? $_POST['event'] : ''; ?>" />
                <i class="fas fa-clock"></i>
            </div>
            <div class="item">
                <p>Select Artist</p>
                <select name="artist">
                    <option value="">*Please select*</option>
                    <option value="1" <?php echo isset($_POST['artist']) && $_POST['artist'] === '1' ? 'selected' : ''; ?>>Artist 1</option>
                    <option value="2" <?php echo isset($_POST['artist']) && $_POST['artist'] === '2' ? 'selected' : ''; ?>>Artist 2</option>
                    <option value="3" <?php echo isset($_POST['artist']) && $_POST['artist'] === '3' ? 'selected' : ''; ?>>Artist 3</option>
                    <option value="4" <?php echo isset($_POST['artist']) && $_POST['artist'] === '4' ? 'selected' : ''; ?>>Artist 4</option>
                </select>
            </div>
            <div class="item">
                <p>Description of Event</p>
                <textarea rows="3" name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
            </div>
            <div class="item">
                <p>Promoter's Name</p>
                <input type="text" name="promo" value="<?php echo isset($_POST['promo']) ? $_POST['promo'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Venue Name</p>
                <input type="text" name="venue_name" value="<?php echo isset($_POST['venue_name']) ? $_POST['venue_name'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Venue Address</p>
                <input type="text" name="venue_address_1" placeholder="Street address" value="<?php echo isset($_POST['venue_address_1']) ? $_POST['venue_address_1'] : ''; ?>" />
                <input type="text" name="venue_address_2" placeholder="Street address line 2" value="<?php echo isset($_POST['venue_address_2']) ? $_POST['venue_address_2'] : ''; ?>" />
                <div class="city-item">
                    <input type="text" name="city" placeholder="City" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>" />
                    <input type="text" name="region" placeholder="Region" value="<?php echo isset($_POST['region']) ? $_POST['region'] : ''; ?>" />
                    <input type="text" name="postal" placeholder="Postal / Zip code" value="<?php echo isset($_POST['postal']) ? $_POST['postal'] : ''; ?>" />
                    <select name="country">
                        <option value="">Country</option>
                        <option value="1" <?php echo isset($_POST['country']) && $_POST['country'] === '1' ? 'selected' : ''; ?>>Russia</option>
                        <option value="2" <?php echo isset($_POST['country']) && $_POST['country'] === '2' ? 'selected' : ''; ?>>Germany</option>
                        <option value="3" <?php echo isset($_POST['country']) && $_POST['country'] === '3' ? 'selected' : ''; ?>>France</option>
                        <option value="4" <?php echo isset($_POST['country']) && $_POST['country'] === '4' ? 'selected' : ''; ?>>Armenia</option>
                        <option value="5" <?php echo isset($_POST['country']) && $_POST['country'] === '5' ? 'selected' : ''; ?>>USA</option>
                    </select>
                </div>
            </div>
            <div class="item">
                <p>Venue Capacity</p>
                <input type="text" name="capacity" value="<?php echo isset($_POST['capacity']) ? $_POST['capacity'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Expected Attendance</p>
                <input type="text" name="attendance" value="<?php echo isset($_POST['attendance']) ? $_POST['attendance'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Type of Performance</p>
                <select name="performance">
                    <option value="">*Please select*</option>
                    <option value="1" <?php echo isset($_POST['performance']) && $_POST['performance'] === '1' ? 'selected' : ''; ?>>Solo Performance</option>
                    <option value="2" <?php echo isset($_POST['performance']) && $_POST['performance'] === '2' ? 'selected' : ''; ?>>Full Band</option>
                </select>
            </div>
            <div class="item">
                <p>Set Time (in minutes)</p>
                <input type="text" name="time" value="<?php echo isset($_POST['time']) ? $_POST['time'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Contact Person</p>
                <div class="name-item">
                    <input type="text" name="contact_firstname" placeholder="First" value="<?php echo isset($_POST['contact_firstname']) ? $_POST['contact_firstname'] : ''; ?>" />
                    <input type="text" name="contact_lastname" placeholder="Last" value="<?php echo isset($_POST['contact_lastname']) ? $_POST['contact_lastname'] : ''; ?>" />
                </div>
            </div>
            <div class="item">
                <p>Contact Email</p>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
            </div>
            <div class="item">
                <p>Contact Number</p>
                <input type="text" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>" />
            </div>
            <div class="question">
                <p>Will this event be recorded?</p>
                <div class="question-answer">
                    <div>
                        <input type="radio" value="yes" id="radio_1" name="recorded" <?php echo isset($_POST['recorded']) && $_POST['recorded'] === 'yes' ? 'checked' : ''; ?> />
                        <label for="radio_1" class="radio"><span>Yes</span></label>
                    </div>
                    <div>
                        <input type="radio" value="no" id="radio_2" name="recorded" <?php echo isset($_POST['recorded']) && $_POST['recorded'] === 'no' ? 'checked' : ''; ?> />
                        <label for="radio_2" class="radio"><span>No</span></label>
                    </div>
                </div>
            </div>
            <div class="btn-block">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <?php if (isset($errors['file'])) : ?>
                    <div class="error"><?php echo $errors['file']; ?></div>
                <?php endif; ?>
            </div>
            <div class="btn-block">
                <button type="submit" href="/" name="submit">SEND</button>
            </div>
        </form>
    </div>
</body>

</html>
