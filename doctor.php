
<!DOCTYPE html>
<html lang="en kn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "images/logo3.png" type = "Images/png">
        <title>HMS/doctor.html</title>
        <link rel="stylesheet" type="text/css" href="drstyle.css">
        

    </head>
    <body>
        <section >
            <div class="body_part">
                <h2 class="central-head text-center fs-1">WELCOME TO THE WORLD OF HEALING</h2>
                <p class="tagline">Empowering People to Improve Their Lives.</p>
                <h3>Welcome Doctor</h3>
                <div id="view_pat">
                    <button id="view_patient" >View Your Patients</button>
                </div>

            </div>
            <div id="patient_table">
                <table>
                    <tr>
                      <th>Patient Id</th>
                      <th>Full Name</th>
                      <th>Report</th>
                    </tr>
                  
                  <?php
                  
                  include "connection.php"; // Using database connection file here
                  echo"<script type=\"text/javascript\">
                  {
                  var DrID = localStorage.getItem('doctorID');
                  $.POST('doctor.php', {'doctorID':DrID});}

                  </script>";

                  $doctorID=$_POST['doctorID'];
                  echo $doctorID;
                  
                  $sql = "SELECT `patient_Id`, `P_Name` FROM `patient` WHERE patient_Id in(SELECT  `patient_patient_Id` FROM `doctor_has_patient` WHERE Doctor_Doctor_ID=$doctorID);";
                  $result = mysqli_query($conn, $sql);
                  
                  while($data = mysqli_fetch_array($result))
                  {
                  ?>
                    <tr>
                      <td><?php echo $data['patient_Id']; ?></td>
                      <td><?php echo $data['P_Name']; ?></td>
                      <td><button class="view_rep" value="$data['patient_Id']" >View Report</button></td>
                    </tr>	
                  <?php
                  }
                  ?>
                  </table>
                  
                  <?php mysqli_close($conn); // Close connection ?>
                  

            </div>

        </section>

    </body>
</html>