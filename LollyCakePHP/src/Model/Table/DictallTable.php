<?php
namespace App\Model\Table;

use App\Model\Entity\Dictall;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dictall Model
 *
 */
class DictallTable extends Table
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

        $this->table('dictall');
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
            ->allowEmpty('LANGID');

        $validator
            ->integer('ORD')
            ->allowEmpty('ORD');

        $validator
            ->integer('LANGIDTO')
            ->allowEmpty('LANGIDTO');

        $validator
            ->allowEmpty('DICTTYPENAME');

        $validator
            ->allowEmpty('DICTNAME');

        $validator
            ->allowEmpty('URL');

        $validator
            ->allowEmpty('CHCONV');

        $validator
            ->allowEmpty('AUTOMATION');

        $validator
            ->integer('AUTOJUMP')
            ->allowEmpty('AUTOJUMP');

        $validator
            ->allowEmpty('DICTTABLE');

        $validator
            ->allowEmpty('TRANSFORM_WIN');

        $validator
            ->allowEmpty('TRANSFORM_MAC');

        $validator
            ->integer('WAIT')
            ->allowEmpty('WAIT');

        $validator
            ->allowEmpty('TEMPLATE');

        return $validator;
    }
}
