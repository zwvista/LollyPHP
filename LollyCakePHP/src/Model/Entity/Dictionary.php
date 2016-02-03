<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dictionary Entity.
 *
 * @property int $LANGID
 * @property int $ORD
 * @property int $DICTTYPEID
 * @property string $DICTNAME
 * @property int $LANGIDTO
 * @property string $URL
 * @property string $CHCONV
 * @property string $AUTOMATION
 * @property int $AUTOJUMP
 * @property string $DICTTABLE
 * @property string $TEMPLATE
 */
class Dictionary extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'LANGID' => false,
        'DICTNAME' => false,
    ];
}
