<?php

declare(strict_types=1);

/**
 * Collection classes are placed inside the ResourceModel/<entity>
 * Always extend AbstractCollection from Magento\Framework\Model\ResourceModel\Db\Collection\
 */

namespace JonaM\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use JonaM\Blog\Model\ResourceModel\Post as PostResourceModel;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        /**
         * This _init expects 2 parameters: model and resource model
         * Reference both static class contants by: Post::class
         * 
         * Since this will return ambiguous with both resource and model will use Post::class,
         * you can initiate one parameter to a different constant name above
         * 
         * Ex: use JonaM\Blog\Model\ResourceModel\Post as PostResourceModel;
         */
        $this->_init(Post::class, PostResourceModel::class);
    }
}
