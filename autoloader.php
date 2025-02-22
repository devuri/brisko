<?php

namespace Brisko;

use Exception;

class Autoloader
{
    /**
     * @var array Namespace to directory mappings
     */
    private static array $prefixes = [];

    /**
     * @var array Cached file paths to improve performance
     */
    private static array $classMap = [];

    /**
     * @var array Files that need to be included manually
     */
    private static array $fileMap = [];

    /**
     * @var null|Autoloader Singleton instance
     */
    private static ?Autoloader $instance = null;

    /**
     * Private constructor to enforce singleton.
     */
    private function __construct()
    {
        spl_autoload_register([$this, 'autoload'], true, true);
    }

    /**
     * Prevents cloning the instance.
     */
    private function __clone()
    {
    }

    /**
     * Prevents unserialization.
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton class.");
    }

    /**
     * Get the singleton instance.
     *
     * @return Autoloader
     */
    public static function init(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Adds a namespace prefix with the corresponding base directory.
     *
     * @param string $prefix  The namespace prefix
     * @param string $baseDir The base directory for class files
     * @param bool   $prepend If true, prepends the base directory (higher priority)
     *
     * @throws Exception
     *
     * @return self
     */
    public function addNamespace(string $prefix, string $baseDir = null, bool $prepend = false): self
    {
        $prefix = trim($prefix, '\\') . '\\';

        $baseDir = realpath(rtrim( __DIR__ . DIRECTORY_SEPARATOR . $baseDir, DIRECTORY_SEPARATOR));

        if ( ! $baseDir || ! is_dir($baseDir)) {
            throw new Exception("Invalid base directory: $baseDir");
        }

        if ( ! isset(self::$prefixes[$prefix])) {
            self::$prefixes[$prefix] = [];
        }

        if ($prepend) {
            array_unshift(self::$prefixes[$prefix], $baseDir . DIRECTORY_SEPARATOR);
        } else {
            self::$prefixes[$prefix][] = $baseDir . DIRECTORY_SEPARATOR;
        }

        return $this;
    }

    /**
     * Includes a single non-class file safely.
     *
     * @param string $filePath Absolute or relative path to the file
     *
     * @return self
     */
    public function addFile(string $filePath): self
    {
        $realPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . $filePath);

        if ( ! $realPath || ! is_file($realPath) || ! is_readable($realPath)) {
            error_log("[Autoloader] ERROR: Unable to include file $filePath");

            return $this;
        }

        if ( ! \in_array($realPath, self::$fileMap, true)) {
            self::$fileMap[] = $realPath;
            require_once $realPath;
        }

        return $this;
    }

    /**
     * Includes multiple non-class files at once.
     *
     * @param array $files Array of file paths
     *
     * @return self
     */
    public function addFiles(array $files): self
    {
        foreach ($files as $file) {
            $this->addFile($file);
        }

        return $this;
    }

    /**
     * Autoloads a class file based on its namespace.
     *
     * @param string $class Fully qualified class name
     */
    private function autoload(string $class): void
    {
        $class = ltrim($class, '\\');

        // Check cache first
        if (isset(self::$classMap[$class])) {
            require_once self::$classMap[$class];

            return;
        }

        foreach (self::$prefixes as $prefix => $baseDirs) {
            if (0 === strpos($class, $prefix)) {
                $relativeClass = substr($class, \strlen($prefix));
                $relativeClass = str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

                foreach ($baseDirs as $baseDir) {
                    $file = $baseDir . $relativeClass;

                    if (is_readable($file)) {
                        self::$classMap[$class] = $file;
                        require_once $file;

                        return;
                    }
                }
            }
        }

        error_log("[Autoloader] ERROR: Unable to load class $class");
    }
}

Autoloader::init();
