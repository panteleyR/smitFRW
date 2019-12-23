<?php

namespace Framework\Foundation;

use Framework\Container\Container;
use Framework\Contracts\Foundation\Application as ApplicationContract;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Application extends Container //implements ApplicationContract, HttpKernelInterface
{
    /**
     * The SMIT framework version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * The base path for the framework installation.
     *
     * @var string
     */
    protected $basePath;

    public function __construct($basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }
        $this->registerBaseBindings();
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION;
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');
        $this->bindPathsInContainer();
        return $this;
    }
    /**
     * Bind all of the application paths in the container.
     *
     * @return void
     */
    protected function bindPathsInContainer()
    {
//        $this->instance('path', $this->path());
        //$this->instance('path.base', $this->basePath());
        // $this->instance('path.lang', $this->langPath());
        // $this->instance('path.config', $this->configPath());
        // $this->instance('path.public', $this->publicPath());
        // $this->instance('path.storage', $this->storagePath());
        // $this->instance('path.database', $this->databasePath());
        // $this->instance('path.resources', $this->resourcePath());
        // $this->instance('path.bootstrap', $this->bootstrapPath());
    }
    /**
     * Get the base path of the Laravel installation.
     *
     * @param  string  $path Optionally, a path to append to the base path
     * @return string
     */
    public function basePath($path = '')
    {
        return $this->basePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        static::setInstance($this);

        //$this->instance('app', $this);
        //
        // $this->instance(Container::class, $this);
        // $this->singleton(Mix::class);
        //
        // $this->instance(PackageManifest::class, new PackageManifest(
        //     new Filesystem, $this->basePath(), $this->getCachedPackagesPath()
        // ));
    }
}
