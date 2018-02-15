<?php
	declare(strict_types=1);

	namespace Cruxoft;

	use Monolog\Logger;
	use Monolog\Registry;

	class LogBook
	{
		public static function get(string $name) : Logger
		{
			return Registry::hasLogger($name) ? Registry::getInstance($name) : self::add($name);
		}

		public static function add(string $name, array $handlers = array(), array $processors = array()) : Logger
		{
			if (empty($name))
			{
				throw new \InvalidArgumentException("Logger name is required.");
			}

			$logger = new Logger($name, $handlers, $processors);
			Registry::addLogger($logger);

			return $logger;
		}
	}
?>
