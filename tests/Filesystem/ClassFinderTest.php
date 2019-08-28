<?php

use Collective\Annotations\Filesystem\ClassFinder;
use PHPUnit\Framework\TestCase;

class ClassFinderTest extends TestCase
{
    /**
     * @var ClassFinder
     */
    protected $finder;

    public function setUp(): void
    {
        $this->finder = new ClassFinder();
    }

    public function testFindClass()
    {
        $class = $this->finder->findClass(__DIR__ . '/fixtures/finder/AnyController.php');
        $this->assertEquals('App\Http\Controllers\AnyController', $class);
    }

    public function testFindInterfaces()
    {
        $class = $this->finder->findClass(__DIR__ . '/fixtures/finder/AnyInterface.php');
        $this->assertEquals('App\Contracts\AnyInterface', $class);
    }

    public function testFindClasses()
    {
        $classes = $this->finder->findClasses(__DIR__ . '/fixtures/finder');
        sort($classes);
        $this->assertEquals([
            'App\Contracts\AnyInterface',
            'App\Http\Controllers\AnyController',
        ], $classes);
    }
}
