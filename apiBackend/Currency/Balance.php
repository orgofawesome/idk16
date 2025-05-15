<?php
if ($isUserAuthenticated){
		$json = [ 'robux' => $userInfo['robuxBalance'] ];
}else{
	http_response_code(403);
	$json = ['errors' => [ [ 'code' => 403, 'message' => "Forbidden" ] ] ];
}
	
die(json_encode($json));
?>