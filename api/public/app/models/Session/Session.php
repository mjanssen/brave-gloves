<?php namespace Models\Session;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

/**
 * Class Session
 * @package Models\Gym;
 */
class Session extends Model
{
    public function initialize()
    {
        $this->setSource("sessions");

        $this->belongsTo('user_id', 'Models\User\User', 'id', ['alias' => 'User']);

        $this->hasMany('id', 'Models\Session\SessionEffectiveTime', 'session_id', [
            'alias' => 'EffectiveTimes',
            'params' => [
                'order' => 'id DESC'
            ]
        ]);

        $this->addBehavior(
            new Timestampable(
                [
                    'beforeCreate' => [
                        'field' => 'timestamp',
                        'format' => 'Y-m-d H:i:s'
                    ]
                ]
            )
        );
    }
}
