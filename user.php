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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Document</title>
</head>

<body>
    <div class="Mod">
        <div class="User Data" style="width: 90%;
        display: flex;
        justify-content: space-between;
        gap: 10px;
        display: flex;
        justify-content: center; 
        align-items: center; 
        display: grid;
grid-template-columns: repeat(2, 1fr);">
            <div class="car">
                <h1 style="margin: 20px;">Welcome User <?php echo $row["first_name"]; ?></h1>

                <div>

                    <div class="data-container"> Number_Cars <br>
                        <h2>24</h2>
                    </div>
                    <div class="data-container"> Number_Rent <br>
                        <h2>9</h2>
                    </div>
                    <div class="data-container"> Total_Rent <br>
                        <h2> 306</h2>
                    </div>
                    <div class="data-container"> Total_Earn <br>
                        <h2> 36630$ </h2>
                    </div>

                </div>

                <div class="Submit" style=" display: flex;
            justify-content: space-between;
            gap: 10px;
            display: flex;
            justify-content: center; 
            align-items: center; 
            display: grid;
    grid-template-columns: repeat(2, 1fr);">
                    <button class="buttonSubmit"> Log Out </button>
                    <div>
                        <form action="">
                            <div class="info_lines">Select Branch : </div>
                            <select name="TYPE" class="info_input">
                                <option selected>x1
                                <option>x2
                                <option>x3
                                <option>x4
                            </select>
                            <input class="buttonSubmit" type="submit" value="Supmit Branch">
                    </div>
                </div>
            </div>




            <div class="car">
                <h1>Edit Your info</h1>
                <form action="">

                    <p>
                    <div class="info_lines">First name : </div>
                    <input class="info_input" type="text" name="last_name" id="first_name" placeholder="<?php echo $row["first_name"]; ?>" size="60">
                    </p>

                    <p>
                    <div class="info_lines">Last Name : </div>
                    <input class="info_input" type="text" name="last_name" id="last_name" placeholder="<?php echo $row["last_name"]; ?>" size="60">
                    </p>

                    <p>
                    <div class="info_lines">Email : </div>
                    <input class="info_input" type="text" name="last_name" id="email" placeholder="<?php echo $row["Email"]; ?>" size="60">
                    </p>

                    <p>
                    <div class="info_lines">SSN : </div>
                    <input class="info_input" type="text" name="last_name" id="ssn" placeholder="<?php echo $row["phone"]; ?>" size="60">
                    </p>

                    <p>
                    <div class="info_lines">Address : </div>
                    <input class="info_input" type="text" name="last_name" id="address" placeholder="<?php echo $row["password"]; ?>" size="60">
                    </p>

                    <p>
                    <div class="info_lines">phone : </div>
                    <input class="info_input" type="text" name="last_name" id="phone" placeholder="<?php echo $row["address"]; ?>" size="60">
                    </p>

                    <input class="buttonSubmit" type="submit" value="Edit info">

                </form>
            </div>

        </div>






        <div div class="Rent" style=" display: flex;
            justify-content: space-between;
            gap: 10px;
            display: flex;
            justify-content: center; 
            align-items: center; 
            display: grid;
    grid-template-columns: repeat(2, 1fr);">
            <div class="car">
                <div class="data-container"> Total Rented Cars <br>
                    <h2>4</h2>
                </div>
                <div class="data-container"> Current Rented Cars <br>
                    <h2>1</h2>
                </div>
                <a href="">
                    Current Rent Cars : <br>
                    <div class="requirement">G-class</div>
                </a>
            </div>

            <div class="car">

                <h1>Rent Car</h1>
                <form action="">

                    <div>
                        <form action="">

                            <div>
                                <div class="info_lines">Type : </div>
                                <select name="TYPE" class="info_input">
                                    <option selected>not specify
                                    <option>SPORT
                                    <option>G-Class
                                    <option>JEEP
                                    <option>lemousine
                                    <option>Sedan
                                    <option>Hatchback
                                    <option>LUXURY
                                    <option>SUV
                                </select>

                                <div class="info_lines">color : </div>
                                <select name="TYPE" class="info_input">
                                    <option selected>not specify
                                    <option>red
                                    <option>white
                                    <option>blue
                                    <option>black
                                    <option>gray
                                    <option>green
                                    <option>rose
                                </select>



                                <div class="info_lines">Country of manufacture : </div>
                                <select name="TYPE" class="info_input">
                                    <option selected>not specify
                                    <option>Fraince
                                    <option>German
                                    <option>US
                                    <option>China
                                    <option>Japan
                                    <option>Korean
                                    <option>Europa
                                </select>

                                <div class="info_lines">Brand : </div>
                                <select name="TYPE" class="info_input">
                                    <option selected>not specify
                                    <option>BMW
                                    <option>Mercedes
                                    <option>KIA
                                    <option>Honda
                                    <option>Hyundai
                                    <option>Korean
                                    <option>Toyota
                                    <option>Volkswagen
                                    <option>Audi
                                    <option>Chevrolet
                                    <option>Mitsubishi
                                    <option>Nissan
                                    <option>Škoda
                                    <option>Porsche
                                    <option>JEEP
                                    <option>Peuqeot
                                    <option>Opel
                                    <option>Tesla
                                    <option>MG
                                </select>

                                <div class="info_lines"> Write Your Choixe : </div>
                                <p>
                                <div class="info_lines">Model : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60">
                                </p>

                                <p>
                                <div class="info_lines">Brand : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60">
                                </p>

                                <p>
                                <div class="info_lines">Color : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60">
                                </p>

                                <p>
                                <div class="info_lines">Country of manufacture : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60">
                                </p>

                                <p>
                                <div class="info_lines">Type : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60">
                                </p>



                                </select>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="car" style="width: 90%;
                                    display: flex;
                                    justify-content: space-between;
                                    gap: 10px;
                                    display: flex;
                                    justify-content: center; 
                                    align-items: center; 
                                    display: grid;
      grid-template-columns: repeat(3, 1fr);
            ">
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>
            <div class="car-card">
                <div class="car-brand">Mercedes</div>
                <div class="car-price">Rental price : $300 per day</div>
                <div class="car-description">
                    mercides
                </div>
                <div class="car-prop">
                    <div class="requirement">red</div>
                    <div class="requirement">German</div>
                    <div class="requirement">G-class</div>
                    <div class="requirement">2022</div>
                </div>
                <button class="apply-btn">Apply Now</button>
            </div>

        </div>

    </div>

</body>

</html>