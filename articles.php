<?php include_once "path.php"?>
<?php include_once "app/controllers/usersAutorization.php"; ?>
<?php include_once "app/controllers/Post.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<?php include_once "app/includes/include.php" ?>
	<title>Учебный портал</title>
</head>

<body>
	<?php include_once "app/includes/header.php" ?>
	<!--Карусель-->
	<!--Последние статьи-->
	<div class="container-fluid">
		<p></p>
		<p></p>
		<div class=" content row ">
			<div class="categori-content sidebar  col-sm-12 col-md-2 col-lg-2 ">
				<h3> Категории</h3>
				<?php foreach ($arrayCategories as $key => $value) : ?>

					<a href="articles.php?categori_id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a>
				<?php endforeach ?>
			</div>

			<div class="main-content  col-sm-12 col-md-10 col-lg-10 ">
				<h2 class="content-name">Материалы по теме </h2>
				<?php foreach ($arrayArticlesbyPosts as $key => $value) : ?>
					<div class="row post">
						<div class=" col-md-5 col-sm-5 col-left">
							<a href="article.php?id_article=<?php echo $value['id'] ?>">
								<img class="img-fluid" src="assets\img\posts\<?php echo $value["img"] ?>">
							</a>
						</div>
						<div class=" col-md-7 col-sm-7 col-right">
							<div>
								<p class="categori"><a href="articles.php?categori_id=<?php echo $value['category_id'] ?>"><?php echo $value['name'] ?></a></p>
								<h2><a  href="article.php?id_article=<?php echo $value['id'] ?>"><?php echo $value['titel'] ?></a></h2>
								<div class="container-fluid">
									<div class="row">
										<p class="text"> <?php echo $value['description'] ?> </p>
									</div>
									<div class="row">
										<div class="container-fluid ">
											<div class="row descript-wrap">
												<div class="col-md-5 col-left">
													<span><i class="far fa-user"></i> <?php echo $value['Firstname'] . " " . $value['Lastname'] ?></span>
												</div>
												<div class="col-md-5 col-left">
													<span><i class="far fa-calendar-alt"></i> <?php echo $value['CreatedTime'] ?></span>
												</div>
												<div class="col-md-2 col-right">
													<span class="pull-right"> <i class="fas fa-eye text-right"></i> <?php echo $value['Views'] ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach ?>



			</div>
		</div>

	</div>
	


</body>
<?php include_once "app/includes/footer.php" ?>

</html>