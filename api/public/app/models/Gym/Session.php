<?php namespace Models\Gym;

use Phalcon\Mvc\Model;

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
    }
}
