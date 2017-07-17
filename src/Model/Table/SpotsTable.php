<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class SpotsTable extends Table
{

 
    public function initialize(array $config)
    {
		parent::initialize($config);

        $this->setTable('spots');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }


    public function validationDefault(Validator $validator)
    {
        return $validator;
            
    }


    public function buildRules(RulesChecker $rules)
    {
		$rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
