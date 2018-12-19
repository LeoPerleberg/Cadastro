<?php
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		header('Location: ../View/Index.php');
	}
	$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Exibe</title>
    <?php include_once "config.php"; ?>
</head>
<body>
	<?php
		require_once 'NavBar.php';
	?>


</body>
</html>