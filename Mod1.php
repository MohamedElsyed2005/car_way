<?php

   session_start();
   require 'config.php';

   if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM car ");
    
    $row = mysqli_fetch_assoc($result);
   }
   else{
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
        
        <div class="car">
            <h1 style="margin: 20px;">Welcome Mod [DUBAI]</h1>

            <div >

                <div class="data-container">  Number_Cars  <br> <h2>24</h2></div>
                <div class="data-container"> Number_Rent <br> <h2>9</h2> </div>
                <div class="data-container"> Total_Rent <br><h2> 306</h2></div>
                <div class="data-container"> Total_Earn <br><h2> 36630$ </h2></div>

            </div>
                 <button class="buttonSubmit"> Log Out </button>
        </div>


        <div class="car">
            <h1>Add New Car</h1>
            
            <form action="Mod.php" method="post" >

                        <p>
                            <div class="info_lines" >Brand : </div>
                                <input class="info_input" type="text" name="brand" id="brand" placeholder="Brand" size="60" >
                        </p>


                        <p>
                            <div class="info_lines" >Model :  </div>
                                <input class="info_input" type="text" name="model" id="model" placeholder="Model" size="60" >
                        </p>

                        <p>
                            <div class="info_lines" >Type :  </div>
                            <select class="info_input" name="type" id="type"> 
                            <option selected>SUV
                            <option>SPORT
                            <option>G-Class
                            <option>JEEP
                            <option>lemousine
                            <option>Sedan
                            <option>Hatchback
                            <option>LUXURY
                            </select>
                        </p>

                        <p>
                            <div class="info_lines" >Country of manufacture : </div>
                                <input class="info_input" type="text" name="manufacture" id="manufacture" placeholder="Country of manufacture" size="60" >
                        </p>


                        <p>
                            <div class="info_lines" >Color : </div>
                                <input class="info_input" type="text" name="color" id="color" placeholder="Color" size="60" >
                        </p>


                        <p>
                            <div class="info_lines" >Year of manufacture: </div>
                                <input class="info_input" type="number" name="year" id="year" placeholder="Year of manufacture" size="60" >
                        </p>



                        <p>
                            <div class="info_lines" >Plate_id : </div>
                                <input class="info_input" type="text" name="plate_id" id="plate_id" placeholder="Plate_id" size="60" >
                        </p>

                        
                        <p>
                            <div class="info_lines" >Office_id : </div>
                                <input class="info_input" type="number" name="office_id" id="Office_id" placeholder="Office_id" size="60" >
                        </p>

                         <input  class="buttonSubmit" type="submit" value="Add Car" name="submit">

            </form>
        </div>



        <div class="car">
            <h1>Update Car</h1>
            <p>
                <form action="">
                        <div class="info_lines" >Type : </div>
                        <select name="TYPE"class="info_input" >
                        <option selected>SUV
                        <option>SPORT
                        <option><?php echo $row["address"]; ?>
                        <option>G-Class
                        <option>JEEP
                        <option>lemousine
                        <option>Sedan
                        <option>Hatchback
                        <option>LUXURY
                        </select>
                    </p>
                    
                            <div class="info_lines" >plate_id : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60" >
                        </p>

                        <p>
                            <div class="info_lines" >Model :  </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60" >
                        </p>

                        <p>
                            <div class="info_lines" >Name : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60" >
                        </p>

                        <p>
                            <div class="info_lines" >Color : </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60" >
                        </p>

                        <p>
                            <div class="info_lines" >Type : </div>
                            <select name="TYPE"class="info_input" >
                            <option selected>SUV
                            <option>SPORT
                            <option>G-Class
                            <option>JEEP
                            <option>lemousine
                            <option>Sedan
                            <option>Hatchback
                            <option>LUXURY
                            </select>
                        </p>

                        <p>
                            <div class="info_lines" >Country of manufacture :  </div>
                                <input class="info_input" type="text" name="last_name" id="last_name" placeholder="Last Name" size="60" >
                        </p>

                        <input  class="buttonSubmit" type="submit" value="Update Info" >

            </form>
        </div>

            

    </div>

</body>
</html>