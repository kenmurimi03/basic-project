<?php

require 'connection.php';

function error422($message){

    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

function addClient($clientInput){

    global $conn;

    $client_name = mysqli_real_escape_string($conn, $clientInput['client_name']);
    $gender = mysqli_real_escape_string($conn, $clientInput['gender']);

    if(empty(trim($client_name))){

        return error422('Enter your name');
    }
    elseif(empty(trim($gender))){
        
        return error422('Enter your gender');
    }
    else{
        $query = "INSERT INTO clients (client_name,gender) VALUES ('$client_name','$gender')";
        $result = mysqli_query($conn, $query);

        $jsonsql = "SELECT * FROM clients";
        $jsonresult = mysqli_query($conn, $jsonsql);

        if($result){

            $jsondata = array();
            while ($row = mysqli_fetch_assoc($jsonresult)) {
                $jsondata[] = $row;
            }
            $json_data = json_encode($jsondata) . PHP_EOL;

            $file_name = 'data.json';
            file_put_contents($file_name, $json_data);

            $data = [
                'status' => 201,
                'message' => 'Client Created Successfully',
            ];
            header("HTTP/1.0 500 Created");
            return json_encode($data);

        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

function getClientList(){

    global $conn;

    $query = "SELECT * FROM clients";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Client List Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Clients Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function getClient($clientParams){

    global $conn;

    if($clientParams['clientid'] == null){

        return error422('Enter Client id');
    }

    $clientId = mysqli_real_escape_string($conn, $clientParams['clientid']);

    $query = "SELECT * FROM clients WHERE clientid='$clientId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);

            $data = [
                'status' => 200,
                'message' => 'Client Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Such Client Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function addRoom($roomInput){

    global $conn;

    $room_number = mysqli_real_escape_string($conn, $roomInput['room_number']);
    $size = mysqli_real_escape_string($conn, $roomInput['size']);
    $cost = mysqli_real_escape_string($conn, $roomInput['cost']);

    if(empty(trim($room_number))){

        return error422('Enter Room Number');
    }
    elseif(empty(trim($size))){

        return error422('Enter Size');
    }
    elseif(empty(trim($cost))){

        return error422('Enter Cost');
    }
    else{
        $query = "INSERT INTO rooms (room_number, size, cost) VALUES ('$room_number','$size','$cost')";
        $result = mysqli_query($conn, $query);

        $jsonsql = "SELECT * FROM rooms";
        $jsonresult = mysqli_query($conn, $jsonsql);

        if($result){
            $jsondata = array();
            while ($row = mysqli_fetch_assoc($jsonresult)) {
                $jsondata[] = $row;
            }
            $json_data = json_encode($jsondata);
    
            $file_name = 'data.json';
            file_put_contents($file_name, $json_data);

            $data = [
                'status' => 201,
                'message' => 'Room Created Successfully',
            ];
            header("HTTP/1.0 500 Created");
            return json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

function getRoomList(){

    global $conn;

    $query = "SELECT * FROM rooms";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Room List Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Rooms Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function getRoom($roomParams){

    global $conn;

    if($roomParams['roomid'] == null){

        return error422('Enter Room id');
    }

    $roomId = mysqli_real_escape_string($conn, $roomParams['roomid']);

    $query = "SELECT * FROM rooms WHERE roomid='$roomId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);

            $data = [
                'status' => 200,
                'message' => 'Room Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Room Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function getRoomStatus($roomStatusParams){

    global $conn;

    if($roomStatusParams['status'] == null){

        return error422('Enter Status');
    }

    $status = mysqli_real_escape_string($conn, $roomStatusParams['status']);

    $query = "SELECT * FROM rooms WHERE status='$status'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Rooms Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Rooms Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function addBooking($bookingInput){

    global $conn;

    $clientid = mysqli_real_escape_string($conn, $bookingInput['clientid']);
    $roomid = mysqli_real_escape_string($conn, $bookingInput['roomid']);

    if(empty(trim($clientid))){

        return error422('Enter Client id');
    }
    elseif(empty(trim($roomid))){

        return error422('Enter Room id');
    }
    else{
        $bookingid = $_GET['bookingid'];
        $query = "INSERT INTO bookings (clientid, roomid) VALUES ('$clientid','$roomid')";
        $result = mysqli_query($conn, $query);

        // select room id to update status
        $selectQuery = "SELECT roomid FROM bookings WHERE bookingid = '$bookingid'";
        $selectresult = mysqli_query($conn, $selectQuery);

        // update the status to 1 for given roomid
        $updateQuery = "UPDATE rooms SET status = 1 WHERE roomid = '$roomid'";
        mysqli_query($conn, $updateQuery);

        $jsonsql = "SELECT * FROM bookings";
        $jsonresult = mysqli_query($conn, $jsonsql);

        if($result){
            $jsondata = array();
            while ($row = mysqli_fetch_assoc($jsonresult)) {
                $jsondata[] = $row;
            }
            $json_data = json_encode($jsondata);
    
            $file_name = 'data.json';
            file_put_contents($file_name, $json_data);

            $data = [
                'status' => 201,
                'message' => 'Booking Created Successfully',
            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

function getBooking($bookingParams){

    global $conn;

    if($bookingParams['bookingid'] == null){

        return error422('Enter Booking id');
    }

    $bookingId = mysqli_real_escape_string($conn, $bookingParams['bookingid']);

    $query = "SELECT * FROM bookings WHERE bookingid='$bookingId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);

            $data = [
                'status' => 200,
                'message' => 'Booking Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Booking Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function getBookingList(){

    global $conn;

    $query = "SELECT * FROM bookings";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Booking List Fetched Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Bookings Found',
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

function updateBooking($bookingInput, $bookingParams){
    
    global $conn;

    if(!isset($bookingParams['bookingid'])){

        return error422('Booking id not found in URL');
    }elseif($bookingParams['bookingid'] == null){

        return error422('Enter Booking id');
    }

    $bookingId = mysqli_real_escape_string($conn, $bookingParams['bookingid']);

    $check_out = mysqli_real_escape_string($conn, $bookingInput['check_out']);

    if(empty(trim($check_out))){

        return error422('Enter Check Out Date and Time(YYYY-MM-DD HH:MM:SS)');
    }
    else{
        $query = "UPDATE bookings SET check_out='$check_out' WHERE bookingid='$bookingId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        $jsonsql = "SELECT * FROM bookings";
        $jsonresult = mysqli_query($conn, $jsonsql);

        if($result){
            $jsondata = array();
            while ($row = mysqli_fetch_assoc($jsonresult)) {
                $jsondata[] = $row;
            }
            $json_data = json_encode($jsondata);
    
            $file_name = 'data.json';
            file_put_contents($file_name, $json_data);

            $data = [
                'status' => 200,
                'message' => 'Booking Updated Successfully',
            ];
            header("HTTP/1.0 200 Success");
            return json_encode($data);
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

/* function bookingTotal($clientid, $roomid, $check_in, $check_out){

    global $conn;

    $roomQuery = "SELECT cost FROM rooms WHERE roomid = '$roomid'";
    $roomResult = mysqli_query($conn, $roomQuery);
    $roomRow = mysqli_fetch_assoc($roomResult);
    $roomPrice = $roomRow['cost'];

    // Calculate the number of nights
    $checkIn = strtotime($check_in);
    $checkOut = strtotime($check_out);
    $numNights = ($checkOut - $checkIn) / (60 * 60 * 24);

    // Calculate the total amount
    $total = $roomPrice * $numNights;

    // Close the database connection
    mysqli_close($conn);

    return $total;
}
*/
?>