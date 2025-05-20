<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Event\EventInterface;
use Cake\Validation\Validator;

/**
 * BoardGames Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsToMany $Categories
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\BoardGame newEmptyEntity()
 * @method \App\Model\Entity\BoardGame newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BoardGame> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BoardGame get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BoardGame findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BoardGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BoardGame> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BoardGame|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BoardGame saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGame>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGame> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGame>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGame> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BoardGamesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('board_games');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Categories', [
            'foreignKey' => 'board_game_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'board_games_categories',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'board_game_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_board_games',
        ]);
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->categories) {
            $entity->category_string = $this->_buildCatString($entity->categories);
        }

        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug =  strtolower(substr($sluggedTitle, 0, 191));
        }
    }

    protected function _buildCatString($categories)
    {
        $selectedCats = [];

        // Loop all selected cats and get their titles
        foreach ($categories as $category) {
            ['title' => $title] = $category;
            $selectedCats[] = $title;
        }

        return implode(', ', $selectedCats);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('entry_creator')
            ->allowEmptyString('entry_creator');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        // TODO: Look into how to validate slug after beforeSave
        // $validator
        //     ->scalar('slug')
        //     ->maxLength('slug', 191)
        //     ->requirePresence('slug', 'create')
        //     ->notEmptyString('slug')
        //     ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('publisher')
            ->maxLength('publisher', 255)
            ->requirePresence('publisher', 'create')
            ->notEmptyString('publisher');

        $validator
            ->integer('min_players')
            ->requirePresence('min_players', 'create')
            ->notEmptyString('min_players');

        $validator
            ->integer('max_players')
            ->requirePresence('max_players', 'create')
            ->notEmptyString('max_players');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);

        return $rules;
    }
}
