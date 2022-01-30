<!DOCTYPE html>
<html lang="en kn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset = "UTF-8" />
        <link rel = "icon" href = "images/logo3.png" type = "Images/png">
        <title>HMS</title>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body >
        <h1> WELCOME TO HOSPITAL MANAGEMENT SYSTEM</h1>
        <h2>Manage all data at one place</h2>
        <h2 style="font-style: italic;color: rgb(240, 149, 13);">Welcome user</h2>
        <h3 style="font-style: italic;color: rgb(240, 149, 13);">let's view and Download your data</h3>
        <div id="patient_option">
            <div class="patient_option">
             <button id="view_report">View report</button>
             <button id="download_report">Download Report</button>
            </div>
 
             <div id="show_data">
             <div id="basic">
                    <h3> Basic details</h3>
                    <table>
                            <?php

                                
                include "connection.php"; // Using database connection file here
                // echo"<script type=\"text/javascript\">
                // $(document).ready( function() {
                // var DrID = localStorage.getItem('doctorID');
                // $_POST('', {'doctorID':DrID});}

                // </script>";
                session_start();
                print_r($_SESSION) ;
                //echo $_SESSION['PatientID'];
                $PatientID=(int)$_SESSION['PatientID'];
                // $doctorID = "<script type=\"text/javascript\">document.write(localStorage.getItem('doctorID'))</script>";
                // // echo $doctorID;

                $sql = "SELECT `patient_Id`, `P_Name`, concat( city,',' ,state,',', country,',',Pin_code) AS Address , `DOB`, `bloodgroup`,`phone_No` FROM `patient` WHERE patient_Id=$PatientID;";

                $result = mysqli_query($conn, $sql);

                while($data = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td>Patient Id</td>
                    <td><?php echo $data['patient_Id']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $data['P_Name']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $data['Address']; ?></td>
                </tr>	
                <tr>
                    <td>Date of birth</td>
                    <td><?php echo $data['DOB']; ?></td>
                </tr>
                <tr>
                    <td>bloodgroup</td>
                    <td><?php echo $data['bloodgroup']; ?></td>
                </tr>
                <tr>
                    <td>phone_No</td>
                    <td><?php echo $data['phone_No']; ?></td>
                </tr>		
                <?php
                }
                ?>
                </table>
                </div>
                <br>
                <br>
                <div id="allergy">
                <h3> Allergies</h3>
                <table>
                                
                <?php
                $sql = "SELECT `allergy` FROM `patient_allergy` WHERE patient_patient_Id=$PatientID;";
                $result = mysqli_query($conn, $sql);

                while($data = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td><?php echo $data['allergy']; ?></td>
                
                </tr>	
                <?php
                }
                ?>
                </table>

                </div>


                <?php mysqli_close($conn); // Close connection ?>

             </div>
             <button id="patient_back">close</button>
           
         </div>

    </body>
    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
                                   const patient_option=document.getElementById("show_data");
                           const closebtn=document.getElementById("patient_back");
                           const viewbtn=document.getElementById("view_report");
                        //    const patient_option=document.getElementById("patient_option");
                        viewbtn.addEventListener("click", (e) => {
                           patient_option.style.visibility="visible";})

                           closebtn.addEventListener("click", (e) => {
                               e.preventDefault();
                               patient_option.style.visibility="hidden";
                               patient_log.style.visibility="hidden";
                           })
    </script>
</body>
</html>