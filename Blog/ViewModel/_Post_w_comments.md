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
 * 
 * $ collection from JonaM\Blog\Model\ResourceModel\Post\Collection
 *      - you can alias this as $postsCollection; if you are retrieving multiple collections
 *      - Example:
 *          JonaM\Blog\Model\ResourceModel\Post\Collection as PostsCollection; = $ postsCollection
 *          JonaM\Blog\Model\ResourceModel\Book\Collection as BooksCollection; = $ booksCollection
 */

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
        /**
         * Call $ collection and return getItems()
         * getItems() - retrieves a list of collection items
         *      - returns an array of DataObject's so this 
         *        is the same format as the sample data initially
         */
        return $this->collection->getItems();
    }

    public function getTotalPosts(): int
    {
        /**
         * This is Magento's count() functionality
         */
        return $this->collection->count();
    }
}
