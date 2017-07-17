<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property int $age
 * @property \Cake\I18n\FrozenTime $created
 */
class Spot extends Entity
{
	
}
