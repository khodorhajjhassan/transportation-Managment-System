<?php
// Check if the requested page/resource exists
/*if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    // Check if query parameters exist
    if (!empty($_SERVER['QUERY_STRING'])) {
        // Set the HTTP response code to 200
        http_response_code(200);
        // Continue serving the request
        return false;
    } else {
        // Set the HTTP response code to 404
        http_response_code(404);

        // Include the custom 404 error page
        include('404.html');
        exit();
    }
}
*/
?>
