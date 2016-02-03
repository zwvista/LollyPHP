<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Language Entity.
 *
 * @property int $LANGID
 * @property string $LANGNAME
 * @property string $CHNNAME
 * @property string $VOICE
 * @property int $CURBOOKID
 * @property string $ENGNAME
 */
class Language extends Entity
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
    ];
}
