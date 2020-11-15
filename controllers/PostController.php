<?php

// connecting posts model to get information using it's methods
include_once ROOT.'/models/posts.php';
class PostController{
	public function actionIndex() {
		$postsList = array();
		$postsList = Posts::getPostsList();
		require_once ROOT.'/views/site/index.php';
		return true;
	}
	public function actionView($id) {
		$postsItem = Posts::getPostsItemById($id);
		echo '<pre>';
		print_r($postsItem);
		echo '</pre>';
		return true;
	}
	public function actionAdd() {
		if(isset($_POST['submit'])):
			$title = '';
			$content= '';
			$title = $_POST['title'];
			$content = $_POST['content'];
		 	$result = Posts::addPostsItem($title, $content);
		endif;

	        require_once ROOT . '/views/newpost/index.php';
		return 'true';
	}
}