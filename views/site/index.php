<?php include(ROOT . '/views/layouts/header.php') ?>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Блог Лорсанова М.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
	  <a class="btn btn-primary" href="/posts/add/" role="button">Добавить пост</a>
      </ul>
    </div>
  </nav>
</header>
      <br><br><br>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
      <?php foreach($postsList as $postItem): ?> 
      <div class="row">
	  <div class="col-sm border border-success" style="margin-bottom: 25px;"> 
      <h2 class="panel-title">
	  <a href="/posts/<?php echo $postItem['id']?>">    
	<?php echo $postItem['title']; ?>
	  </a>
      </h2>
      <p class="lead">
	      <?php echo $postItem['content'];?>
      </p>
      <p class="lead">
		  Дата создания данного поста : <?php echo $postItem['date']; ?>
	</p>
		  </div>
      </div>
    <?php endforeach;?>
  </div>
</main>
<?php include(ROOT . '/views/layouts/footer.php') ?>