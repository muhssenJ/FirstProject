<?php

    $errors = [
        'firstNameError' => '',
        'lastNameError' => '',
        'emailError' => '',
    ];

    if (isset($_POST['submit'])){ //when we click submit button

            $firstName= $_POST['firstName']; //for send variable like string
            $lastName=  $_POST['lastName'];
            $email=     $_POST['email'];

        //for check the first name
        if(empty($firstName)){//is is null firstname and last name and email
            $errors['firstNameError'] = 'الرجاء ادخال الاسم الاول';
        }
        //for check the last name
        if(empty($lastName)){
            $errors['lastNameError'] = 'الرجاء ادخال الاسم الاخير';
        }
        //for check email
        if(empty($email)){
            $errors['emailError'] = 'الرجاء ادخال الايميل';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['emailError'] = 'الايميل المدخل غير صحيح';
        }
        
        
        
        
        
        if (!array_filter($errors)){

            $firstName= mysqli_real_escape_string($conn, $_POST['firstName']); //for send variable like string
            $lastName=  mysqli_real_escape_string($conn, $_POST['lastName']);
            $email=     mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "INSERT INTO users(firstName, lastName, email) 
                VALUES('$firstName','$lastName','$email') ";

            if(mysqli_query($conn,$sql)){
                header('Location: '. $_SERVER['PHP_SELF']); //After Save Refrech the page
            }else{
                echo 'Error: ' . mysqli_error($conn);
            }
         }

    }

?>

