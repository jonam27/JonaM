<?php

declare(strict_types=1);

namespace JonaM\Blog\Model\ResourceModel\Post;

use JonaM\Blog\Model\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use JonaM\Blog\Model\ResourceModel\Post as PostResourceModel;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Post::class, PostResourceModel::class);
    }
}
