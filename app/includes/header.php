<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
	<header class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12  col-md-5 col-left">
					<h1><i class="fas fa-book "></i> Учебный портал</h1>
				</div>
				<nav class="col-12 col-sm-12 col-md-7 col-right">
					<ul>
						<li><a href="<?php echo BASE_URL."index.php"?>">Главная</a></li>
						<li><a href="<?php echo BASE_URL."articles.php"?>"><i class="far fa-newspaper"></i> Статьи</a></li>
						<?php if(isset($_SESSION['status'])&&$_SESSION['status']=="author"):?>
						<li><a href="<?php echo BASE_URL."admin/posts"?>"><i class="far fa-user"></i><?php echo $_SESSION["firstName"].' '.$_SESSION["lastName"]?> </a>
						<li><a href="<?php echo BASE_URL."logOut.php"?>"> Выход</a>
						<?php else:?>
							<li><a href="<?php echo BASE_URL."logIn.php"?>"><i class="far fa-user"></i>Личный кабинет</a>
						<?php endif;?>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	