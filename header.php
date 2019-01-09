<?php
	require_once __DIR__ . '/pre.php';
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>SKIPPA</title>
	<link rel = "stylesheet" href="<?= $skippa_css ?>">
</head>
<body>
	<div class = "main">
		<h2><a href = "<?= $index_php ?>">ようこそ！SKIPPAへ</a></h2>
		<P><?= $userName ?>さん</P>
		<ui class = "navi">
			<li><a href = "<?= $index_php ?>">トップページ</a></li>
			<li>|</li>
			<li><a href = "<?= $search_php ?>">検索画面</a></li>
			<li>|</li>
			<li><a href = "<?= $entryCategory_php ?>">物件登録</a></li>
			<li>|</li>
			<li><a href = "<?= $skippaInfo_php ?>">SKIPPAとは</a></li>
			<li>|</li>
			<?php
				if($userName === "ゲスト"){
					echo '<li><a href = "' . $login_php . '">ログイン</a></li>';
				}else{
					echo '<li><a href = "' .$mypage_php . '">マイページ</a></li>';
					echo '<li>|</li><li><a href = "' . $logout_php .'">ログアウト</a></li>';
				}
			?>
		</ui>
		<hr>
