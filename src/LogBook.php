<?php
	declare(strict_types=1);

	namespace Cruxoft;

	use Monolog\Logger;
	use Monolog\Registry;

	class LogBook
	{
		/**
		 * Gets a Monolog Logger object from the global Registry.
		 *
		 * If the requested Logger name doesn't exist in the Registry one is created with default settings
		 *
		 * @param string $name Name to be used for the logger in the Registry
		 *
		 * @return Logger
		 */
		public static function get(string $name) : Logger
		{
			return Registry::hasLogger($name) ? Registry::getInstance($name) : self::add($name);
		}

		/**
		 * Adds a Monolog Logger object to the global Registry
		 *
		 * @param string $name Name of the Logger to be requested from the Registry
		 * @param array $handlers Handlers for pushing onto the logger
		 * @param array $processors
		 *
		 * @throws \InvalidArgumentException If no name is passed
		 *
		 * @return Logger
		 */
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
