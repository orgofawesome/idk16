<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
$inappropriate_words = array('nigger', 'niggers', 'nigga', 'nig', 'fag', 'faggot', 'tranny', 'retard', 'retarded'); // array of inappropriate words
$failed = "##########################";

$dataArray = array(
    "success"=>true,
    "data"=>array(
        "blacklist"=>$failed,
        "whitelist"=>$failed
    )
);

$message = $_POST["text"]; // the message to filter

if ($message == " "){
    http_response_code(500);
    die;
}

foreach ($inappropriate_words as $word) {
  $pattern = '/\b' . $word . '\b/i'; // case-insensitive regex pattern to match whole words
  $replacement = str_repeat('#', strlen($word)); // replace with hashtags of the same length as the word
  $message = preg_replace($pattern, $replacement, $message); // replace all occurrences of the word in the message
}

//$message = str_repeat('#', strlen($message));


if(isset($_POST["text"])){
    foreach(array("whitelist","blacklist") as &$filter){
        $dataArray["data"][$filter] = $message;
    }
}else{
	http_response_code(500);
	die;
}

echo json_encode($dataArray);

?>