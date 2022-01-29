<!DOCTYPE html>
<html lang="en kn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "images/logo3.png" type = "Images/png">
        <title>HMS/doctor.html</title>
        <link rel="stylesheet" type="text/css" href="drstyle.css">
        

    </head>
    <body >
        <section >
            <div class="body_part">
                <h2 class="central-head text-center fs-1">WELCOME TO THE WORLD OF HEALING</h2>
                <p class="tagline">Empowering People to Improve Their Lives.</p>
                <h3>Welcome Doctor</h3>
                <div id="view_pat">
                <a href="http://127.0.0.1:5000/" target="_blank" id="ML">Use ML models</a>
                </div>

            </div>
            <div id="patient_table">
                <!-- <table>
                    <tr>
                      <th>Patient Id</th>
                      <th>Full Name</th>
                      <th>Report</th>
                    </tr> -->
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

        </section>

    </body>
</html>