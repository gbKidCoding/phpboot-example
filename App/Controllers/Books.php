<?php

namespace App\Controllers;

use App\Service\PhabricatorService;
use PhpBoot\DI\Traits\EnableDIAnnotations;
use Psr\Log\LoggerInterface;

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
     * @inject
     * @var LoggerInterface
     */
    public $logger;

    /**
     * @param LoggerInterface $logger 通过依赖注入传入
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger;
    }

    /**
     * 编辑
     *
     * @route GET /commitEdit
     *
     * @param $api_token
     * @param $queryKey
     * @return string
     */
    public function commitEdit($api_token, $queryKey)
    {
        $phabricatorService = new PhabricatorService();
        return $phabricatorService->diffusionCommitEdit($api_token, $queryKey);
    }
}
