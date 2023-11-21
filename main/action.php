<?php
session_start();
include '../configs/config.php';

function generateUniqueID($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if(isset($_POST['action_name']) && isset($_POST['action_type'])) {
    $action_name = mysqli_real_escape_string($conn, $_POST['action_name']);
    $action_type = mysqli_real_escape_string($conn, $_POST['action_type']);


    if($action_name == "category" && $action_type == "add") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $category_id = "";
        
        $name_check_query = mysqli_query($conn, "SELECT name FROM categories WHERE name = '$name'");
        $name_exists = mysqli_fetch_assoc($name_check_query);
        
        if ($name_exists) {
            $_SESSION['error_message'] = "Category name already exists";
            header("Location: manage-category?action=add"); 
            exit();
        }
        
        do {
            $category_id = generateUniqueID();
        
            $check_query = mysqli_query($conn, "SELECT category_id FROM categories WHERE category_id = '$category_id'");
            $exists = mysqli_fetch_assoc($check_query);
        } while ($exists);
        
        $action = mysqli_query($conn, "INSERT INTO categories (name, status, category_id) VALUES ('$name', '$status','$category_id')");
        
        if ($action) {
            $_SESSION['success_message'] = "Category added successfully";
            header("Location: manage-category?action=add");
            exit();
        } else {
            $_SESSION['error_message'] = "Failed to add category"; 
            header("Location: manage-category?action=add"); 
            exit();
        }
    }
    if($action_name == "product" && $action_type == "add") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);
        $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $product_id = "";
        
        $name_check_query = mysqli_query($conn, "SELECT name FROM products WHERE name = '$name'");
        $name_exists = mysqli_fetch_assoc($name_check_query);
        
        if ($name_exists) {
            $_SESSION['error_message'] = "Product name already exists";
            header("Location: manage-product?action=add"); 
            exit();
        }
        
        do {
            $product_id = generateUniqueID();
        
            $check_query = mysqli_query($conn, "SELECT product_id FROM products WHERE product_id = '$product_id'");
            $exists = mysqli_fetch_assoc($check_query);
        } while ($exists);
        
        $action = mysqli_query($conn, "INSERT INTO products (name, status, cost, category_id, product_id) VALUES ('$name', '$status', '$cost','$category_id', '$product_id')");
        
        if ($action) {
            $_SESSION['success_message'] = "Product added successfully";
            header("Location: manage-product?action=add");
            exit();
        } else {
            $_SESSION['error_message'] = "Failed to add product"; 
            header("Location: manage-product?action=add"); 
            exit();
        }
    }
    if($action_name == "user" && $action_type == "add") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $maximum_hits = mysqli_real_escape_string($conn, $_POST['maximum_hits']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $user_id = "";
        $api_key = "";
        
        $email_check_query = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        $email_exists = mysqli_fetch_assoc($email_check_query);
        
        if ($email_exists) {
            $_SESSION['error_message'] = "Email already exists";
            header("Location: manage-user?action=add"); 
            exit();
        }
        
        do {
            $user_id = generateUniqueID();
        
            $check_query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_id = '$user_id'");
            $exists = mysqli_fetch_assoc($check_query);
        } while ($exists);

        do {
            $api_key = generateUniqueID(27);
        
            $check_query2 = mysqli_query($conn, "SELECT api_key FROM users WHERE api_key = '$api_key'");
            $exists2 = mysqli_fetch_assoc($check_query2);
        } while ($exists2);
        
        $action = mysqli_query($conn, "INSERT INTO users (name, email, mobile,  status, api_key, user_id, maximum_hits) VALUES ('$name', '$email', '$mobile', '$status', '$api_key','$user_id', '$maximum_hits')");
        
        if ($action) {
            $_SESSION['success_message'] = "User added successfully";
            header("Location: manage-user?action=add");
            exit();
        } else {
            $_SESSION['error_message'] = "Failed to add user"; 
            header("Location: manage-user?action=add"); 
            exit();
        }
    }
}



mysqli_close($conn);
?>