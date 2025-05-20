<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersBoardGames Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BoardGamesTable&\Cake\ORM\Association\BelongsTo $BoardGames
 *
 * @method \App\Model\Entity\UsersBoardGame newEmptyEntity()
 * @method \App\Model\Entity\UsersBoardGame newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UsersBoardGame> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersBoardGame get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UsersBoardGame findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UsersBoardGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UsersBoardGame> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersBoardGame|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UsersBoardGame saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UsersBoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersBoardGame>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersBoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersBoardGame> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersBoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersBoardGame>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersBoardGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersBoardGame> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersBoardGamesTable extends Table
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

        $this->setTable('users_board_games');
        $this->setDisplayField('status');
        $this->setPrimaryKey(['user_id', 'board_game_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BoardGames', [
            'foreignKey' => 'board_game_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('rating')
            ->allowEmptyString('rating');

        $validator
            ->boolean('favourite')
            ->allowEmptyString('favourite');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['board_game_id'], 'BoardGames'), ['errorField' => 'board_game_id']);

        return $rules;
    }
}
