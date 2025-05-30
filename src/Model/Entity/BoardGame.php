<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

/**
 * BoardGame Entity
 *
 * @property int $id
 * @property int|null $entry_creator
 * @property string $title
 * @property string $slug
 * @property string $publisher
 * @property int $min_players
 * @property int $max_players
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\User[] $users
 */
class BoardGame extends Entity
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
        'entry_creator' => true,
        'title' => true,
        'slug' => true,
        'publisher' => true,
        'min_players' => true,
        'max_players' => true,
        'created' => true,
        'modified' => true,
        'categories' => true,
        'category_string' => true,
        'users' => true,
    ];

    /**
     * Virtual field for category string
     */
    protected function _getCategoryString()
    {
        if (isset($this->_fields['category_string'])) {
            return $this->_fields['category_string'];
        }

        if (empty($this->categories)) {
            return '';
        }

        $categories = new Collection($this->categories);

        $str = $categories->reduce(function ($string, $cat) {
            return $string . $cat->title . ', ';
        }, '');

        return trim($str, ', ');
    }
}
