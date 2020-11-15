<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="signup-form"><!--sign up form-->
    <h2>Форма добавления поста</h2>
    <form action="#" method="post">
	<div class="form-group">
	    <input type="text" name="title" placeholder="заголовок"/><br>

	</div>
	<div class="form-group">
	    <label for="exampleFormControlTextarea1">cодержание поста</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
	</div>
	<input type="submit" name="submit" class="" value="добавить" />
    </form>
</div><!--/sign up form--><br><br>
<a class="btn btn-primary" href="/posts/" role="button">вернуться на главную</a>

