<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BoardGamesCategory Entity
 *
 * @property int $board_game_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\BoardGame $board_game
 * @property \App\Model\Entity\Category $category
 */
class BoardGamesCategory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'board_game' => true,
        'category' => true,
    ];
}
