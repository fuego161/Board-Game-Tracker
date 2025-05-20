<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BoardGamesCategories Model
 *
 * @property \App\Model\Table\BoardGamesTable&\Cake\ORM\Association\BelongsTo $BoardGames
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\BoardGamesCategory newEmptyEntity()
 * @method \App\Model\Entity\BoardGamesCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BoardGamesCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BoardGamesCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BoardGamesCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BoardGamesCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BoardGamesCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BoardGamesCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BoardGamesCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGamesCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGamesCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGamesCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGamesCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGamesCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGamesCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BoardGamesCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BoardGamesCategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BoardGamesCategoriesTable extends Table
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

        $this->setTable('board_games_categories');
        $this->setDisplayField(['board_game_id', 'category_id']);
        $this->setPrimaryKey(['board_game_id', 'category_id']);

        $this->belongsTo('BoardGames', [
            'foreignKey' => 'board_game_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['board_game_id'], 'BoardGames'), ['errorField' => 'board_game_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
