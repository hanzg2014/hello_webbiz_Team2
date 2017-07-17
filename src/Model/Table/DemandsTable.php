<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class DemandsTable extends Table
{

 
    public function initialize(array $config)
    {
		parent::initialize($config);

        $this->setTable('demands');
        $this->setPrimaryKey('id');
    }


    public function validationDefault(Validator $validator)
    {
            return $validator;
    }


    public function buildRules(RulesChecker $rules)
    {
		return $rules;
    }
}
