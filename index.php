<?php 

include "src/deleteClass.php";
include "src/getClass.php";
include "src/postClass.php";

// İstek methodu kontrolü
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // İstek GET ise veri okuma işlemi gerçekleştirilir
    $data = json_decode(file_get_contents('php://input'), true); // json verileri alınır
    $get_class = new getClass($data);
    $result = $get_class->getMethod();
    header('Content-Type: application/json');
    echo json_encode($result);

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // İstek POST ise veri kaydetme işlemi gerçekleştirilir
    $data = json_decode(file_get_contents('php://input'), true); // json verileri alınır
    $post_class = new postClass($data);
    $result = $post_class->postMethod();
    // Sonuçlar json olarak döndürülür
    header('Content-Type: application/json');
    echo json_encode($result);

} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    // İstek DELETE ise veri kaydetme işlemi gerçekleştirilir
    $data = json_decode(file_get_contents('php://input'), true); // json verileri alınır
    $delete_class = new deleteClass($data);
    $result = $delete_class->deleteMethod();
    // Sonuçlar json olarak döndürülür
    header('Content-Type: application/json');
    echo json_encode($result);
    
} else {

    // Geçersiz bir istek geldiğinde hata mesajı döndürülür
    $result = [
        'status' => 'error',
        'message' => 'Invalid request method'
    ];
    // Sonuçlar json olarak döndürülür
    header('Content-Type: application/json');
    echo json_encode($result);

}