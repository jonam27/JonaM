<?php

/**
 * The name of the ResourceModel file name will always
 * match the name of the Model
 */

declare(strict_types=1);

/**
 * namespaces is akin to the module directories
 */

namespace JonaM\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * AbstractDb is an abstract class and it expects us
 * to implement the _construct() function
 * This is not a standard php constructor as this only has one underscore
 * 
 */
class Post extends AbstractDb
{

    const MAIN_TABLE = 'jonam_blog_post';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        /**
         * Here, we are expected to call init() that will
         * link our database table to this resourceModel
         * 
         * This init will have 2 parameters. If you go inside the init() class,
         * it will have $mainTable and $idFieldName
         * 
         * We need to set this as class constants bec this can be used
         * in other parts of our code
         */
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
