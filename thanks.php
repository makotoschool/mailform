<?php
/*
mail()を使ってメールを送信します。マニュアルサイトhttp://php.net/manual/ja/function.mail.php
appacheがインストールされているサーバーマシン内のメールサーバー（sendmailとかpostfix）を操作できるのが
mail()です。
mail関数の引数（4つ入る）に適切なデータを入れる。
mail(送信先,タイトル,メール本体,ヘッダー情報)
*/

$to = "goodbooks823@gmail.com";
$subject = "メールフォームからの送信です";
$name =h($_POST['name']);
$kana =h($_POST['kana']);
$email =h($_POST['mail']);
$messagebody=h($_POST['message']);

//メールクライアントソフトから送信されたようなを追加すると送信先のメールクライアントそふとから「迷惑メール判定」を受けにくくなります

  $ip = getenv('REMOTE_ADDR');//サーバーのipアドレス
  $host = gethostbyaddr($ip);//サーバーのホスト名    
  $message .= "Name: ".$name.$kana."\n";//ここからヘッダー情報を$messageに追記していきます。
  $message .= "Email: ".$email."\n";
  $message .= "Subject: ".$subject."\n";
  $message .= "Message: ".$messagebody."\n\n";
  $message .= "IP:".$ip." HOST: ".$host."\n";

  $headers .= "From: <".$email.">\r\n"; 

  mail($to, $subject, $message, $headers); 

function h($val){
    $s=htmlspecialchars($val,ENT_QUOTES);
    return $s;
}


?>
<!DOCTYPE html >
<html lang="ja">
<head>
	<title>ありがとうございました</title>	
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/screen.css" media="screen" />
</head>
<body>

<div id="container">				
							
		<h2><?php echo $name ?>様お問い合わせあがとうございます。送信完了しました</h2>
		<button type="button" onClick="location.href='index.html'">戻る</button>
					
</div>

</body>
</html>

