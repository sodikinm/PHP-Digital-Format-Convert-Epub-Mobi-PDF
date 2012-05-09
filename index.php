<?php
	if (isset($_GET['function'])) {
		require_once 'application/controllers/EpubController.php';
		require_once 'application/controllers/MobiController.php';
		require_once 'application/controllers/PdfController.php';
		require_once('application/Bootstrap.php');
		
		$function = ucfirst($_GET['function']);
		$controllerName = "{$function}Controller";
		$modelName = "{$function}Model";
		$actionName = "create{$function}Action";
		
		//use variable variables based on $_GET variable to instantiate class and call method
		$bootstrap = Bootstrap::singleton();
		$tools = $bootstrap->getTools(); 
		$transform = new TransformModel();
		
		$model = new $modelName($tools);
		$controller = new $controllerName($model, $tools, $transform);
		$controller->$actionName();
		exit();
	}
?>
<html>
<head></head>
<link rel="stylesheet" href="bootstrap.css" />
<body>
	<div class="container">
	<?php
		//a VERY simple page router/despatcher to include the 'default' view if the index.php file is requested
		if (strtolower($_SERVER['PHP_SELF']) == "/digitalformatconvert/index.php") {
			include 'application/views/default.php';
		}
	?>
	</div>
</body>
</html>