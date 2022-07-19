<?php

declare(strict_types=1);

namespace JonaM\Blog\Api;

use JonaM\Blog\Api\Data\PostInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Blog post CRUD interface
 * @api
 * @since 1.0.0
 */
interface PostRepositoryInterface
{
    /**
     * @param integer $id
     * @return PostInterface
     * @throws LocalizedException
     */
    public function getById(int $id): PostInterface;

    /**
     *
     * @param PostInterface $post
     * @return PostInterface
     * @throws LocalizedException
     */
    public function save(PostInterface $post): PostInterface;

    /**
     *
     * @param integer $id
     * @return boolean
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}
