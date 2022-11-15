<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function sendMessage($chatID, $messaggio, $token) {
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$TG_TOKEN = "5212677589:AAFqkRDxlkhsTwy3rOFS55aseQif-HKJ6c4";
$CHAT_ID = "-1001797956453";

// sendMessage($CHAT_ID, "test", $TG_TOKEN);

$name = $_POST["name"];
$telegram = $_POST["telegram"];
// $email = $_POST["email"];
$phone = $_POST["phone"];
// $date = $_POST["date"];

if (isset($name) && isset($email) && isset($phone) && isset($date)) {
    $text = "Имя: ".$name."\nEmail: ".$telegram."\nТелефон: ".$phone."Дата встречи: ".$date;
    sendMessage($CHAT_ID, $text, $TG_TOKEN);
    header('Location: https://lisboa-webcam.com/feedback.html');
} else {
    header('Location: https://lisboa-webcam.com/feedback.html');
}

?>
