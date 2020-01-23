<?php

// Include config file

require_once 'config.php';

// Define variables and initialize with empty values
$name = $address = $salary = $class = $phone = $discipline = $appointment_date = $subject = "";

$name_err = $address_err = $salary_err = $class_err = $phone_err = $discipline_err = $appointment_date_err = $subject_err = "";
 

 

// Processing form data when form is submitted

if(isset($_POST["id"]) && !empty($_POST["id"])){

    // Get hidden input value

    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = 'Please enter your address.';     
    } else{
        $address = $input_address;
    }

     // Validate discipline
     $input_discipline = trim($_POST["discipline"]);
     if(empty($input_discipline)){
         $discipline_err = 'Please enter your discipline.';     
     } else{
         $discipline = $input_discipline;
     }

     // Validate date of appointment
     $input_appointment_date = trim($_POST["appointment_date"]);
     if(empty($input_appointment_date)){
         $appointment_date_err = 'Please enter your discipline.';     
     } else{
         $appointment_date = $input_appointment_date;
     }
 

    // Validate class
    $input_class = trim($_POST["class"]);
    if(empty($input_class)){
        $class_err = 'Please enter a class you take or put nil';     
    } else{
        $class = $input_class;
    }

    // Validate class
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = 'Please enter a phone number.';     
    } else{
        $phone = $input_phone;
    }

    // Validate class
    $input_subject = trim($_POST["subject"]);
    if(empty($input_subject)){
        $subject_err = 'Please enter a phone number.';     
    } else{
        $subject = $input_subject;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = 'Please enter a positive integer value.';
    } else{
        $salary = $input_salary;
    }

    


     // Check input errors before inserting in database
     if(empty($name_err) && empty($address_err) && empty($salary_err) && empty($class_err) && empty($phone_err) && empty($discipline_err) && empty($appointment_date_err)){


        // Prepare an insert statement

         $sql = "UPDATE kcs_employees SET name=?, address=?, salary=?, class=?, phone=?, discipline=?, appointment_date=?, subject=? WHERE id=?";

         

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "sssssssss", $param_name, $param_address, $param_salary, $param_class, $param_phone, $param_discipline, $param_appointment_date, $param_subject, $param_id);

            

            // Set parameters

            $param_name = $name;

            $param_address = $address;

            $param_salary = $salary;

            $param_class = $class;

            $param_phone = $phone;

            $param_discipline = $discipline;

            $param_appointment_date = $appointment_date;

            $param_subject = $subject;

            $param_id = $id;

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Records updated successfully. Redirect to landing page

                header("location: index.php");

                exit();

            } else{

                echo "Something went wrong. Please try again later.";

            }

        }

         

        // Close statement

        mysqli_stmt_close($stmt);

    }

    

    // Close connection

    mysqli_close($link);

} else{

    // Check existence of id parameter before processing further

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

        // Get URL parameter

        $id =  trim($_GET["id"]);

        

        // Prepare a select statement

        $sql = "SELECT * FROM kcs_employees WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_id);

            

            // Set parameters

            $param_id = $id;

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                $result = mysqli_stmt_get_result($stmt);

    

                if(mysqli_num_rows($result) == 1){

                    /* Fetch result row as an associative array. Since the result set

                    contains only one row, we don't need to use while loop */

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    

                    // Retrieve individual field value

                $name = $row["name"];

                $address = $row["address"];

                $discipline = $row["discipline"];

                $subject = $row["subject"];

                $phone = $row["phone"];

                $appointment_date = $row["appointment_date"];

                $class = $row["class"];

                $salary = $row["salary"];

                } else{

                    // URL doesn't contain valid id. Redirect to error page

                    header("location: error.php");

                    exit();

                }

                

            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

        }

        

        // Close statement

        mysqli_stmt_close($stmt);

    }  else{

        // URL doesn't contain id parameter. Redirect to error page

        header("location: error.php");

        exit();

    }

}

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Update Record</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">

        .wrapper{

            width: 500px;

            margin: 0 auto;

        }

    </style>

</head>

<body>

    <div class="wrapper">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="page-header">

                        <h2>Update Record</h2>

                    </div>

                    <p>Please edit the input values and submit to update the record.</p>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Residential Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($class_err)) ? 'has-error' : ''; ?>">
                            <label>Class</label>
                            <input type ="text" name="class" class="form-control" value="<?php echo $class; ?>">
                            <span class="help-block"><?php echo $class_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($discipline_err)) ? 'has-error' : ''; ?>">
                            <label>Discipline</label>
                            <input type="text" name="discipline" class="form-control" value="<?php echo $discipline; ?>">
                            <span class="help-block"><?php echo $discipline_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($subject_err)) ? 'has-error' : ''; ?>">
                            <label>Subject(s) Taken</label>
                            <input type="text" name="subject" class="form-control" value="<?php echo $subject; ?>">
                            <span class="help-block"><?php echo $subject_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($appointment_date_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Appointment</label>
                            <input type="date" name="appointment_date" class="form-control" value="<?php echo $appointment_date; ?>">
                            <span class="help-block"><?php echo $appointment_date_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                        <input type="submit" class="btn btn-primary" value="Submit">

                        <a href="index.php" class="btn btn-default">Cancel</a>

                    </form>

                </div>

            </div>        

        </div>

    </div>

</body>

</html>