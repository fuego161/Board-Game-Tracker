<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersBoardGame Entity
 *
 * @property int $user_id
 * @property int $board_game_id
 * @property int|null $rating
 * @property bool|null $favourite
 * @property string $status
 * @property string|null $notes
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BoardGame $board_game
 */
class UsersBoardGame extends Entity
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
        'rating' => true,
        'favourite' => true,
        'status' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'board_game' => true,
    ];
}
