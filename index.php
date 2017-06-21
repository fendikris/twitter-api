
<?php
include "twitteroauth/twitteroauth.php";

$consumer_key = "9SdgejlEqinEzZuArkBAEdgPq";
$consumer_secret = "tSq4dKpNuDPUh2hZIapuyfaqtyWQyiJQbbThs17trduEQBUysd";
$access_token = "876063132690468866-Wd2WDXmRQ6qZLaYIyynSwlGa4ZjmKhB";
$access_token_secret = "rgTl1iwFAUvn7O9lRO9NnZV0rycys2qb6nb0mckVA7cZ1";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=save&result_type=recent&count=20');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Twitter-API search</title>
</head>
<body>
  <form action="" method="post">
    <label>Cari : <input type="text" name="katakunci" placeholder=""/></label>
  </form>
  <?php
  if (isset($_POST['katakunci'])){
    $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['katakunci'].'&result_type=recent&count=50');
  foreach ($tweets as $tweet) {
    foreach ($tweet as $t) {
      echo '<img src="'.$t->user->profile_image_url.'" /> '.$t->text.'</br>.';
      }
    }}
   ?>

</body>
</html>
