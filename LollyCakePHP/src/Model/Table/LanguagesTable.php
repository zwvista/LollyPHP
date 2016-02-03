<?php
namespace App\Model\Table;

use App\Model\Entity\Language;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Languages Model
 *
 */
class LanguagesTable extends Table
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

        $this->table('languages');
        $this->displayField('LANGID');
        $this->primaryKey('LANGID');
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
            ->requirePresence('LANGNAME', 'create')
            ->notEmpty('LANGNAME');

        $validator
            ->requirePresence('CHNNAME', 'create')
            ->notEmpty('CHNNAME');

        $validator
            ->allowEmpty('VOICE');

        $validator
            ->integer('CURBOOKID')
            ->allowEmpty('CURBOOKID');

        $validator
            ->allowEmpty('ENGNAME');

        return $validator;
    }
}
