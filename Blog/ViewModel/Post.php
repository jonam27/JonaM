<?php

/**
 * ViewModel - an intermediary layer between the controller, data and view layers
 * - responsible for fetching or querying data from the database layer and to prep data for display in a template
 * - this is to make controllers smaller and add more flexibility
 * - ability to call the same ViewModel from multiple areas without duplicating code, 
 *   while also slimming down the responsibility of controllers.
 * 
 * Post.php - You can name these ViewModels however you wish, and it depends on 
 *            how you want to organize them. For now we are just keeping it simple 
 *            with a single Post ViewModel.
 * 
 * ArgumentInterface - This will implement ArgumentInterface from Magento\Framework\View\Element\Block
 *      - Any object that is injected into a block argument should be implementing this interface.
 *      - You can create any number of custom functions in this ViewModel
 */

declare(strict_types=1);

namespace JonaM\Blog\ViewModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Post implements ArgumentInterface
{
    public function getList(): array
    {
        return [
            new DataObject(['id' => 1, 'title' => 'Post A']),
            new DataObject(['id' => 2, 'title' => 'Post B']),
            new DataObject(['id' => 3, 'title' => 'Post C'])
        ];
    }

    public function getTotalPosts(): int
    {
        return count($this->getList());
    }
}
