<?php
// Veritabanı bağlantı bilgileri
$host = "localhost"; // Veritabanı sunucusu
$username = "root";  // Veritabanı kullanıcı adı
$password = "";      // Veritabanı şifresi (varsayılan olarak boş olabilir)
$database = "car_rental"; // Bağlanılacak veritabanı adı

// Bağlantı oluşturma
$conn = new mysqli($host, $username, $password, $database);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
} else {
   
}

?>