<?php

function create_open_order($conn, $price, $amount_RP, $date, $username, $ticker, $type){
    $sql = "INSERT INTO open_orders (price, amount_RP, date, username, ticker, order_type) 
    VALUES ('$price', '$amount_RP', '$date', '$username', '$ticker', '$type')";
    $result = $conn->query($sql);
}

function modify_open_order(){

}

function delete_open_order(){

}