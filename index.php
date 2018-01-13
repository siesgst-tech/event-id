<!-- This is a demo page to show how to use header and footer constant through multiple pages !-->
<?php 
// System
require_once dirname(__FILE__).'/config/system.php';
// Variables need here
$page_title = "Index";
// Header
require_once dirname(__FILE__).'/view/header.php';
?>
<!-- ADD YOUR CONTENT HERE !-->

<h1 align="center">WTL-Kit</h1>
<?php
try {
	$dataObj = new DemoController();
	$data = $dataObj->hello('on fire!');
	echo $data;
} catch(Exception $e) {
	echo $e->getMessage();
}
?>

<!-- YOUR CONTENT ENDS HERE !-->
<?php
// Footer
require_once dirname(__FILE__).'/view/footer.php';
?>