<?php

namespace App\Controllers;

include __DIR__.'/vendor/phutil/__phutil_library_init__.php';

use App\Entities\Book;
use Doctrine\Common\Cache\RedisCache;
use PhpBoot\DB\DB;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 图书管理
 *
 * 这是一个示例, 通过实现一套简单的图书管理接口, 展示 PhpBoot 框架的使用方式。
 *
 * @path /books
 */
class Books
{
    use EnableDIAnnotations;

    //启用通过@inject标记注入依赖

    /**
     * @param LoggerInterface $logger 通过依赖注入传入
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger;
    }

    /**
     * 查找图书
     *
     * @route GET /
     *
     * @return string
     * @throws BadRequestHttpException 参数错误
     */
    public function findBooks()
    {
        return "mybooks";
    }

    /**
     * @inject
     * @var LoggerInterface
     */
    public $logger;
}
