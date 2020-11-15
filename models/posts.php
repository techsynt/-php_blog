<?php

class Posts {
	static function getPostsList() {
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM lesson11_db.posts WHERE status = 1');
		$i = 0;		
		$postsList = array();
		while($row = $result->fetch()):
			$postsList[$i]['id']= $row['id'];
			$postsList[$i]['title']= $row['title'];
			$postsList[$i]['content']= $row['content'];
			$postsList[$i]['date']= $row['date'];
			$i++;
		endwhile;
		return $postsList;
	}

	static function getPostsItemById($id) {
		$db = Db::getConnection();
		$id = intval($id);
		if ($id):
			$result = $db->query('SELECT * FROM lesson11_db.posts WHERE id='.$id);
		 	$result->setFetchMode(PDO::FETCH_ASSOC);
			$postsItem = $result->fetch();
			return $postsItem;
		endif;
	}
	public static function addPostsItem($title, $content) {
		$db = Db::getConnection();
		$sql = 'INSERT INTO lesson11_db.posts(title,content)'
			. 'VALUES (:title, :content)';
		$result = $db->prepare($sql);
		$result->bindParam(':title', $title, PDO::PARAM_STR);
		$result->bindParam(':content', $content, PDO::PARAM_STR);
		return $result->execute();
	}

}