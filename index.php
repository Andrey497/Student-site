<?php include_once "path.php"?>
<?php include_once "app/controllers/usersAutorization.php";?>
<?php include_once "app/controllers/Post.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once "app/includes/include.php";?>
	<title>Учебный портал</title>
</head>

<body>
	<?php include_once "app/includes/header.php"?>
	<!--Карусель-->
	<div class="container slider">
		<h2>Самые популярные статьи</h2>
		<div class="row">
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
				
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
					
				</div>
				<div class="carousel-inner">
				<?php foreach($arrayBestPost as $key => $value):?>
					<div class="carousel-item <?php if ($key==0) echo "active"; ?>">
						<a href="article.php?id_article=<?php echo $value['id'] ?>"><img src="assets\img\posts\<?php echo $value["img"] ?>"class="d-block w-100" alt="titel"></a>
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $value['titel'] ?></h5>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Предыдущий</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Следующий</span>
				</button>
			</div>
		</div>
	</div>
	<!--Карусель конец-->

	<!--Последние статьи-->
	<div class="container">
		<div class=" content row">
			<div class="main-content col-md-12 col-lg-9 col-12">
				<h2 class="content-name">Последнии статьи</h2>
				<?php foreach($arrayNewPost as $key => $value):?>
				
					<div class="row post">
						<div class=" col-md-5  col-sm-5 col-left">
							<a href="article.php?id_article=<?php echo $value['id'] ?>">
								<img  class="img-fluid" src="assets\img\posts\<?php echo $value["img"] ?>">
							</a>
						</div>
						<div class=" col-md-7 col-sm-7 col-right">
							<p class="categori"><a href="articles.php?categori_id=<?php echo $value['category_id'] ?>"><?php echo $value['name'] ?></a></p>
							<h2><a href="article.php?id_article=<?php echo $value['id'] ?>"><?php echo $value['titel'] ?></a></h2>
							<p class="text"> <?php echo $value['description'] ?></p>
							<div class="descript-wrap">
								<span><i class="far fa-user"></i><?php echo $value['Firstname'] . " " . $value['Lastname'] ?></span>
								<span><i class="far fa-calendar-alt"></i> <?php echo $value['CreatedTime'] ?></span>
								<span class="pull-right"> <i class="fas fa-eye text-right"></i><?php echo $value['Views'] ?></span>
							</div>
						</div>
					</div>
			
					<?php endforeach ?>
				</div>
			</div>
		</div>
	


	<?php include_once "app/includes/footer.php"?>

</body>

</html>