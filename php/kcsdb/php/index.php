<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
         body{ 
      font: 14px sans-serif;
       text-align: center; 
 }
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>

    <script type="text/javascript">

        $(document).ready(function(){

            $('[data-toggle="tooltip"]').tooltip();   
        });

    </script>

</head>

<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Kano Capital School Pupils'/Students' Data</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Pupil/Student</a>
                    </div>
                    <?php
                    // Include config file
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM pupils";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Class</th>";
                                    /*
                                        echo "<th>Admission Number</th>";
                                        echo "<th>Date of Admission</th>";
                                        echo "<th>Date of Birth</th>";
                                        echo "<th>Place of Birth</th>";
                                        echo "<th>Tribe</th>";
                                        echo "<th>Local Government</th>";
                                        echo "<th>State</th>";
                                        echo "<th>Religion</th>";
                                        echo "<th>Disability</th>";
                                        echo "<th>Parent Name</th>";
                                        echo "<th>Parent Number</th>";
                                        echo "<th>Parent Address</th>";
                                        echo "<th>Parent Occupation</th>";
                                    */
                                        echo "<th>Action</th>";
            

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['class'] . "</td>";
                                    /*
                                        echo "<td>" . $row['admissionnumber'] . "</td>";
                                        echo "<td>" . $row['dateofadmission'] . "</td>";
                                        echo "<td>" . $row['dateofbirth'] . "</td>";
                                        echo "<td>" . $row['placeofbirth'] . "</td>";
                                        echo "<td>" . $row['tribe'] . "</td>";
                                        echo "<td>" . $row['localgovernment'] . "</td>";
                                        echo "<td>" . $row['state'] . "</td>";
                                        echo "<td>" . $row['religion'] . "</td>";
                                        echo "<td>" . $row['disability'] . "</td>";
                                        echo "<td>" . $row['parentname'] . "</td>";
                                        echo "<td>" . $row['parentnumber'] . "</td>";
                                        echo "<td>" . $row['parentaddress'] . "</td>";
                                        echo "<td>" . $row['parentoccupation'] . "</td>";
                                    */
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>