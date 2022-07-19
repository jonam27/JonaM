<?php

/**
 * A model represents any data entity in Magento. 
 * It doesn't necessarily need to be linked to a database either, 
 * as a model can represent any kind of data entity.
 * 
 * This model can stand-alone without any database connection at all
 */

declare(strict_types=1);

namespace JonaM\Blog\Model;

use JonaM\Blog\Api\Data\PostInterface;
use Magento\CatalogImportExport\Model\Import\Proxy\Product\ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * Once you type extends, it will show a dropdown of all classes in Magento
 * Just select for models, AbstractModel in Magento\Framework\AbstractModel
 * and it will be added above in use
 * 
 * After creating your DTO, you can user implements and get 
 * PostInterface in VendorName\ModuleName\Api\Data\PostInterface
 * You will notice an error that you need to add your PostInterface functions, 
 * except for ID because this is already defined in abstract
 * 
 * After updating your modeil to implement a DTO, you need to set this model 
 * up as a preference for this interface. Do this in etc/di.xml
 */
class Post extends AbstractModel implements PostInterface
{
    /**
     * This _construct() will link this Model to our ResourceModel
     *
     * @return void
     */
    protected function _construct()
    {
        /**
         * This init() expects only one argument that is the string param of the
         * ResourceModel class.
         * 
         * This is a reference to our ResourceModel\Post and call thiss
         * static class constant to return the full name of this class
         */
        $this->_init(ResourceModel\Post::class);
    }

    public function getTitle()
    {
        /**
         * Since the title field is already defined in the DTO object,
         * it's much better to pull in that constant from the interface instead as self::TITLE
         * 
         * We are able to call self here rather than referencing the PostInterface, 
         * since we are implementing that interface in this class.
         */
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        /**
         * Similarly, we will call setData, passing in this title constant again.
         * The variable $title as the second parameter which will set the data for this property.
         */
        return $this->setData(self::TITLE, $title);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
}
