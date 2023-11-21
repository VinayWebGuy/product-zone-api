<?php
include '../configs/config.php';

if (isset($_GET['api_key']) && $_GET['api_key'] != '' && isset($_GET['find']) && $_GET['find'] != '') {
    $key = $_GET['api_key'];
    $find = $_GET['find'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE api_key = BINARY '$key' AND status = 1 AND total_hits < maximum_hits");
    $pass = false;

    if (mysqli_num_rows($res) > 0) {
        $pass = true;
        $user_data = mysqli_fetch_assoc($res);
        $total_hits = $user_data['total_hits'];
        $total_hits++;
        mysqli_query($conn, "UPDATE users SET total_hits = $total_hits WHERE api_key = BINARY '$key'");
    }
}
if(isset($find) && $find == "product" && empty($_GET['product_id']) && isset($pass)) {
    $result = mysqli_query($conn, "SELECT name, cost, product_id, category_id FROM products");
    
    if ($result && $pass && mysqli_num_rows($result) > 0) {
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($products);
    } else {
        echo json_encode([]);
    }
}
elseif(isset($find) && $find == "product" && isset($_GET['product_id']) && isset($pass)) { 
    $product_id = $_GET['product_id'];
    $result = mysqli_query($conn, "SELECT name, cost, product_id, category_id FROM products where product_id = '$product_id'");
    
    if ($result && $pass && mysqli_num_rows($result) > 0) {
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($products[0]);
    } else {
        echo json_encode([]);
    }

}
elseif(isset($find) && $find == "category" && isset($pass)) {
    $result = mysqli_query($conn, "SELECT name, category_id FROM categories");
    
    if ($result && $pass && mysqli_num_rows($result) > 0) {
        $categories = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($categories);
    } else {
        echo json_encode([]);
    }
}
elseif(isset($find) && $find == "hits" && isset($pass)) {
    $api_key = $_GET['api_key'];
    $result = mysqli_query($conn, "SELECT * FROM users where api_key = '$api_key'");
    
    if ($result && $pass && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['total_hits'];
    } else {
        echo "Error";
    }
}
else {
    echo json_encode([]);
}
?>
