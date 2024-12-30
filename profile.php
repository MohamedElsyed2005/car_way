<?php
session_start();
require 'config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Css/all.min.css">
    <title>Car Rental Service</title>
</head>

<body>
    <div class="wrapper">
        <!-- Navigation Bar -->
        <nav class="nav">
            <img src="imgs/logo.png" class="nav-logo" alt="Logo">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="Home.php" class="link">Home</a></li>
                    <li><a href="MyCar.php" class="link">My Cars</a></li>
                    <li><a href="Rent_Car.php" class="link">Rent Cars</a></li>
                    <li><a href="category.php" class="link">Categoty</a></li>
                    <li><a href="About_us.php" class="link">About</a></li>
                    <li><a href="profile.php" class="link  active">profile</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="logoutBtn" onclick="showLogoutModal()">Log out</button>
            </div>
        </nav>
        <!-- Logout Modal -->
        <div id="logoutModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Are you sure you want to log out?</h2>
                <p>If you log out, you will need to log in again to continue using the service.</p>
                <button class="btn modal-btn" onclick="logout()">Yes, Log me out</button>
                <button class="btn modal-btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
        <!--Start page -->
        <div class="page">
            <!--Start content-->
            <div class="content">
                <div class="profile">
                    <!-- First Part -->
                    <div class="first_part">
                        <!-- Contact Part -->
                        <div class="contact">
                            <!-- profile_pic Part -->
                            <div class="profile_pic">
                                <img src="imgs/anonymous-avatar-icon-25.jpg" class="Profile pic " width="250"
                                    height="250" class="pic">
                            </div>
                            <!-- profile_Contact Part -->
                            <div class="profile_contact">
                                <div class="contact_account">
                                    <h1 class="name_style"> <?php echo $row["first_name"]; ?> </h1>
                                    <h2 style="margin-left: 10px;"> Contact :</h2>
                                    <div class="Profile_buttons">
                                        <button class="edit_button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                            </svg> Github
                                        </button>
                                        <br>
                                        <button class="edit_button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-linkedin"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                            </svg> LinkedIn </button>
                                        <br>
                                        <button class="edit_button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-twitter-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                            </svg> Twitter </button>
                                    </div>
                                </div>
                                <!-- profile_about Part -->
                                <!-- <div class="about">
                                    <h2 style="margin-left: 10px;"> About :</h2>
                                    <textarea class="info_input" name="about" id=""
                                        style="margin-left: 50px; margin-bottom: 50px;" rows="6" cols="33"></textarea>
                                </div> -->
                                <!-- <a href="Courses.html"><img src="imgs\logo.png" class="profile_logo" width="250"
                                        height="250" id="#prof_logo"></a> -->
                            </div>
                        </div>
                        <!-- Info Part -->
                        <div class="info">
                            <h2> Basic Info</h2>
                            <form action="edit_profile.php" method="post">
                                <!-- First Name Part -->
                                <p>
                                <div class="info_lines">First Name : <button class="edit_button" id="first_name_button"
                                        type="button"> edit </button></div>
                                <input class="info_input" type="text" name="first_name" id="first_name" value="<?php echo $row["first_name"]; ?>"
                                    placeholder="<?php echo $row["first_name"]; ?>" size="60"disabled>
                                </p>
                                <!-- Last Name Part -->
                                <p>
                                <div class="info_lines">Last Name : <button class="edit_button" id="last_name_button"
                                        type="button"> edit </button></div>
                                <input class="info_input" type="text" name="last_name" id="last_name" value="<?php echo $row["last_name"]; ?>"
                                    placeholder="<?php echo $row["last_name"]; ?>" size="60" disabled>
                                </p>
                                <!-- E-mail Part -->
                                <p>
                                <div class="info_lines">E-mail : <button class="edit_button" id="E-mail_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="email" name="email" id="email" value="<?php echo $row["Email"]; ?>" placeholder="<?php echo $row["Email"]; ?>"
                                    size="60" disabled>
                                </p>
                                <!-- Phone Part -->
                                <p>
                                <div class="info_lines">Phone Number : <button class="edit_button" id="Phone_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="text" name="phone" id="phone" value="<?php echo $row["phone"]; ?>" placeholder="<?php echo $row["phone"]; ?>"
                                    size="60" disabled>
                                </p>
                                <!-- Password Part -->
                                <p>
                                <div class="info_lines">Password : <button class="edit_button" id="password_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="password" name="password" id="password" value="<?php echo $row["password"]; ?>"
                                    placeholder="<?php echo $row["password"]; ?>" size="60" disabled>
                                </p>
                                <!-- Location Part -->
                                <p>
                                <div class="info_lines">Location : <button class="edit_button" id="Location_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="text" name="Location" id="Location" value="<?php echo $row["address"]; ?>"
                                    placeholder="Location" size="60" disabled>
                                </p>
                                <!-- GitHub Part -->
                                <!-- <p>
                                <div class="info_lines">Github : <button class="edit_button" id="Github_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="text" name="Github" id="Github"
                                    placeholder="Github" size="60" disabled>
                                </p> -->
                                <!-- LinkedIn Part -->
                                <!-- <p>
                                <div class="info_lines">LinkedIn : <button class="edit_button" id="LinkedIn_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="text" name="LinkedIn" id="LinkedIn"
                                    placeholder="LinkedIn" size="60" disabled>
                                </p> -->
                                <!-- X Part -->
                                <!-- <p>
                                <div class="info_lines">X (formerly Twitter) : <button class="edit_button" id="X_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" type="email" name="X (formerly Twitter)"
                                    id="X (formerly Twitter)" placeholder="X (formerly Twitter)" size="60" disabled>
                                </p> -->
                                <!-- Summary Part -->
                                <!-- <p>
                                <div class="info_lines">Summary : <button class="edit_button" id="Summary_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" style="padding-bottom: 50px;" type="text" name="Summary"
                                    id="Summary" placeholder="Summary" size="60" disabled>
                                </p>
                                <h2> Experience</h2> -->
                                <!-- Work Part -->
                                <!-- <p>
                                <div class="info_lines">Work : <button class="edit_button" id="Work_button"
                                        type="button"> edit </button></div>
                                <br> <input class="info_input" style="padding-bottom: 50px;" type="text" name="Work"
                                    id="Work" placeholder="Work" size="60" disabled>
                                </p> -->
                                <!-- Education Part -->
                                <!-- <p>
                                <div class="info_lines">Education : <button class="edit_button" id="Education_button"
                                        type="button"> edit </button></div>
                                <input class="info_input" style="padding-bottom: 50px;" type="text" name="Education"
                                    id="Education" placeholder="Education" size="60" disabled>
                                </p>
                                <h2> Skills</h2> -->
                                <!-- Technical Skills Part -->
                                <!-- <p>
                                <div class="info_lines">Technical Skills : <button class="edit_button"
                                        id="Technical Skills_button" type="button"> edit </button></div>
                                <input class="info_input" style="padding-bottom: 50px;" type="text"
                                    name="Technical Skills" id="Technical Skills" placeholder="Technical Skills"
                                    size="60" disabled>
                                </p>
                                <P>
                                <p><button class="edit_button"><img src="change.png" alt="" width="10px" height="10px">
                                        Replace Profile Pic</button></p>
                                <p><button class="edit_button"><img src="delete.png" alt="" width="10px" height="10px">
                                        Delete Profile Pic</button></p>
                                </P>
                                <br> -->
                                <!-- submit Part -->
                                <input class="buttonSubmit" type="submit" name="submit" value="Update Info">
                            </form>
                        </div>
                        <!-- Second Part -->
                    </div>
                    <div class="support">
                        <p>support</p>
                    </div>
                </div>
            </div>
            <!--End content-->
        </div>
        <!--End page -->
        <script src="JS/Profile.js"></script>
        <script src="JS/logout.js"></script>
</body>

</html>