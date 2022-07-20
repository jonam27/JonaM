<?php

declare(strict_types=1);

namespace JonaM\Blog\ViewModel;

use JonaM\Blog\Model\ResourceModel\Post\Collection;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Post implements ArgumentInterface
{
    private $collection;
    public function __construct(
        Collection $collection
    ) {
        $this->collection = $collection;
    }

    public function getList(): array
    {
        return $this->collection->getItems();
    }

    public function getTotalPosts(): int
    {
        return $this->collection->count();
    }
}
