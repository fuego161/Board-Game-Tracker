<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\BoardGame;
use Authorization\IdentityInterface;

/**
 * BoardGame policy
 */
class BoardGamePolicy
{
    /**
     * Check if $user can add BoardGame
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\BoardGame $boardGame
     * @return bool
     */
    public function canAdd(IdentityInterface $user, BoardGame $boardGame)
    {
        // Everyone can add board games
        return true;
    }

    /**
     * Check if $user can edit BoardGame
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\BoardGame $boardGame
     * @return bool
     */
    public function canEdit(IdentityInterface $user, BoardGame $boardGame)
    {
        // Only admin and authors can edits board games
        return $this->isAdmin($user) || $this->isAuthor($user, $boardGame);
    }

    /**
     * Check if $user can delete BoardGame
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\BoardGame $boardGame
     * @return bool
     */
    public function canDelete(IdentityInterface $user, BoardGame $boardGame)
    {
        // Only admin can delete board games
        return $this->isAdmin($user);
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

    /**
     * Check if $user is the author of the board game
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\BoardGame $boardGame
     * @return bool
     */
    public function isAuthor(IdentityInterface $user, BoardGame $boardGame)
    {
        return $boardGame->entry_creator === $user->getOriginalData()->id;
    }
}
