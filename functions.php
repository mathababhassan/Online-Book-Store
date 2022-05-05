<?php 
session_start();

// CONNECTING TO DATABASE   
$conn = mysqli_connect('localhost', 'root', '', 'multi_login');

// CHECKING CONNECTION 
if( !$conn ){
    die("Connection Failed: " . mysqli_connect_error());
}

// DECLARING VARIABLES
$username = $email = ""; 
$errors = array();

// CALLING THE REGISTER FUNCTION IF REGISTER BTN IS CLICKED
if ( isset($_POST['register_btn']) ){
    register();
}

function register(){
    // making these global so we can use them in the function
    global $conn, $username, $email, $errors;

    // receiving all the input values from the form
    $username = e($_POST['username']);
    $email = e($_POST['email']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);

    if ( empty($username) ){
        // adding the error to our errors array
        array_push($errors, "Username is required");
    }

    if ( empty($email) ){
        array_push($errors, "Email is required");
    }

    if ( empty($passwor_1) ){
        array_push($errors, "Password is required");
    }

    if ( $password_1 != $password_2 ){
        array_push($errors, "The two passwords do not match");
    }

    // if there are no errors, register user
    if(count($errors) == 0){
        $password = $password_1;
        if( isset($_POST['user_type']) ){
            // if the type is set that means the user is an admin
            // and this is the function that will run

            $user_type = e($_POST['user_type']);
            $sql = "INSERT INTO users (username, email, user_type, password) 
            VALUES('$username', '$email', '$user_type', '$password')";

            // send query to database
            mysqli_query($conn, $sql);

            $_SESSION['success'] = "New user successfully created!";
            header('location: multi_login/admin/admin_home.php');
        }
        else{
            // we will log the user in as just user
            $sql = "INSERT INTO users (username, email, user_type, password) 
            VALUES('$username', '$email', 'user', '$password')";

            // send query to db
            mysqli_query($conn, $sql);

            // get the id of the logged in user
            $logged_in_user_id = mysqli_insert_id($conn);

            // put all logged in user records in a session 
            // we will put it in an array 
            $_SESSION['user'] = getUserById($logged_in_user_id);

            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
    } 
}

// returning a user array by getting their id
function getUserById($id){
    global $conn;
    $sql = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($conn, $sql);

    // this returns an array of the whole record of the user
    $user = mysqli_fetch_assoc($result);

    return $user;
}

// ESCAPING A STRING
function e($variable){
    global $conn;
    return mysqli_real_escape_string($conn, trim($variable));
}

// ERROR FUNCTION 
function display_error(){
    global $errors; 

    if( count($errors) > 0 ){
        echo '<div class="error>';
            foreach ($errors as $error)
            {
                echo $error . '<br>';
            }
        echo '</div>';
    }
}

// CHECKING IF USER IS LOGGED IN 
function isLoggedIn(){
    if ( isset($_SESSION['user']) ){
        return true;
    }
    else{
        return false;
    }
}

// LOG USER OUT IF LOGIN BTN IS CLICKED 
if ( isset($_GET['logout']) ){
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
    die();
}

// CALL THE LOGIN FUNCTION IF login btn is clicked
if ( isset($_POST['login_btn']) ){
    login();
}

function login(){
    global $conn, $username, $errors;

    // grap the form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    // making sure form is filled properly
    if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

    // if there are no errors login user
    if ( count($errors) == 0 ){
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

        $results = mysqli_query($conn, $sql);

        if( mysqli_num_rows($results) == 1 ) // a match found
        // check if that user is the admin
        $logged_in_user = mysqli_fetch_assoc($results);
        if ( $logged_in_user['user_type'] == 'admin' ){
                $_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: multi_login/admin/admin_home.php');	
                die();
        }
        else{
            // if logged in user is not the admin
                $_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
                die();
        }
    }
    else{
        array_push($errors, "Wrong username or password");
    }
}

// MAKING A FUNCTION TO CHECK IF USER IS AN ADMIN TO GRANT ADMIN PRIVILEGES

function isAdmin(){
    if( isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ){
        return true;
    }
    else{
        return false;
    }
}