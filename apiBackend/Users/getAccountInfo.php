<?php
if ($isUserAuthenticated){
	$json = [
		'Username' => $userInfo['name'],
		'HasPasswordSet' => true,
		'Email' => null,
		'AgeBracket' => 0
	];
}else{
	http_response_code(403);
	$json = ['errors' => [ [ 'code' => 403, 'message' => "Forbidden" ] ] ];
}
	
echo json_encode($json);
return;
?>