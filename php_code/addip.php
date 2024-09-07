<?php 
    require "db.php";

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $ip_addr = $data['ip_addr'] ?? Null;
    $isp = $data['isp'] ?? Null;
    $country = $data['country'] ?? Null;
    $timezone = $data['timezone'] ?? Null;

    $query = "INSERT INTO visitor (ip, isp, country, timezone) VALUES (:ip_addr, :isp, :country, :timezone)";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":ip_addr", $ip_addr);
    $stmt->bindParam(":isp", $isp);
    $stmt->bindParam(":country", $country);
    $stmt->bindParam(":timezone", $timezone);

    try {
        $stmt->execute();
        echo "IP inserted";
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $stmt = NULL;