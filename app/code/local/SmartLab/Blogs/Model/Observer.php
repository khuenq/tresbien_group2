<?php
/**
* 
*/
class SmartLab_Blogs_Model_Observer
{
	
	function listBlogByNew($observer)
	{
		var_dump(1);
		die();
		$blogs = $observer->getEvent();
		echo "<pre>";
		var_dump($blogs);
		die();
	}
}
?>
