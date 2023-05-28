function autoloader($className) {
$className = str_replace('\\', '/', $className);
$file = __DIR__ . "/" . $className . ".php";

if (file_exists($file)) {
require_once $file;
}
}

spl_autoload_register('autoloader');