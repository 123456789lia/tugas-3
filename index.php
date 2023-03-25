<?php
if(isset($_POST['search'])) {
    $query = $_POST['query'];
    $url = "https://api.waifu.pics/sfw/" . $query;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);
    $image_url = $result->url;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Search Waifu Images</title>
</head>
<body>
    <h1>Search Waifu Images</h1>
    <form method="post" action="index.php">
        <input type="text" name="query" placeholder="Enter search term">
        <button type="submit" name="search">Search</button>
    </form>

    <?php if(isset($image_url)): ?>
        <img src="<?php echo $image_url; ?>" alt="Waifu Image">
    <?php endif; ?>
</body>
</html>
