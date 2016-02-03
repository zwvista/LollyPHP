<?php
namespace App\Model\Table;

use App\Model\Entity\Dictionary;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dictionaries Model
 *
 */
class DictionariesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('dictionaries');
        $this->displayField('LANGID');
        $this->primaryKey(['LANGID', 'DICTNAME']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('LANGID')
            ->allowEmpty('LANGID', 'create');

        $validator
            ->integer('ORD')
            ->requirePresence('ORD', 'create')
            ->notEmpty('ORD');

        $validator
            ->integer('DICTTYPEID')
            ->requirePresence('DICTTYPEID', 'create')
            ->notEmpty('DICTTYPEID');

        $validator
            ->allowEmpty('DICTNAME', 'create');

        $validator
            ->integer('LANGIDTO')
            ->requirePresence('LANGIDTO', 'create')
            ->notEmpty('LANGIDTO');

        $validator
            ->allowEmpty('URL');

        $validator
            ->allowEmpty('CHCONV');

        $validator
            ->allowEmpty('AUTOMATION');

        $validator
            ->integer('AUTOJUMP')
            ->requirePresence('AUTOJUMP', 'create')
            ->notEmpty('AUTOJUMP');

        $validator
            ->allowEmpty('DICTTABLE');

        $validator
            ->allowEmpty('TEMPLATE');

        return $validator;
    }
}
