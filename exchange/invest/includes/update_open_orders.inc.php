<?php

function create_open_order($conn, $price, $amount_RP, $date, $username, $ticker, $type, $order_id){
    $sql = "INSERT INTO open_orders (price, amount_RP, date, username, ticker, order_type, order_id) 
    VALUES ('$price', '$amount_RP', '$date', '$username', '$ticker', '$type', '$order_id')";
    $result = $conn->query($sql);
}

function modify_open_order(){

}

function delete_open_order($conn, $order_id, $orderType, $ticker){
    $sql = "DELETE FROM open_orders WHERE order_id='$order_id' AND order_type='$orderType' AND ticker='$ticker'";
    $result = $conn->query($sql);
}