<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Category;
use Authorization\IdentityInterface;

/**
 * Category policy
 */
class CategoryPolicy
{
    /**
     * Check if $user can add Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Category $category)
    {
        // Only admin can add categories
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can edit Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Category $category)
    {
        // Only admin can add categories
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can delete Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Category $category)
    {
        // Only admin can add categories
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can view Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canView(IdentityInterface $user, Category $category)
    {
        return true;
    }

    /**
     * Light "admin" checker
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @return bool
     */
    public function isAdmin(IdentityInterface $user)
    {
        return $user->getOriginalData()->id === 1;
    }
}
