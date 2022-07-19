<?php

declare(strict_types=1);

/**
 * This is to forward blog/ to our list page
 */

namespace JonaM\Blog\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index implements HttpGetActionInterface
{
    private $forwardFactory;

    public function __construct(
        /**
         * Always use Magento\Framework\Controller\Result
         * for the Forward and ForwardFactory Objects
         */
        ForwardFactory $forwardFactory
    ) {
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * Always use Magento\Framework\Controller\Result
     * for the Forward return type
     * This would satisfy the return type defined in the HttpGetActionInterface
     *
     * @return Forward
     */
    public function execute(): Forward
    {
        /**
         * @var Forward $forward
         */
        $forward = $this->forwardFactory->create();
        return $forward->setController('post')->forward('list');
    }
}
