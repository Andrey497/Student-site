<?php include_once "path.php"?>
<?php include_once "app/controllers/usersAutorization.php";?>
<?php include_once "app/controllers/Post.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once "app/includes/include.php"?>
	<title>Учебный портал</title>
</head>

<body>
	<?php include_once "app/includes/header.php"
	?>
	<!--Карусель-->
	<!--Последние статьи-->
	<div class="container">
    <h2 class="content-name"><?php echo $arrayArticlesbyPosts[0]['titel']?> </h2>
				<div class="row article">
					<div class=" col-12">
						<p class="text-article"><?php echo $arrayArticlesbyPosts[0]['content']?></p>
					</div>
				</div>
    </div>
	<?php include_once "app/includes/footer.php"?>

</body>

</html>