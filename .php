<?php
if (isset($_POST['url'])) {
    $url = $_POST['url'];
    
    // Generate a unique filename
    $filename = uniqid() . '.txt';
    
    // Download the file
    file_put_contents($filename, file_get_contents($url));
    
    // Provide the file as a download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
    
    // Delete the temporary file
    unlink($filename);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Downloader</title>
</head>
<body>
    <form method="POST" action="">
        <label for="url">Enter the URL of the file to download:</label><br>
        <input type="text" id="url" name="url"><br>
        <input type="submit" value="Download">
    </form>
</body>
</html>
