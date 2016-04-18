<?php namespace Models\Gym;

use Phalcon\Mvc\Model;

/**
 * Class Gym
 * @package Models\Gym;
 */
class Gym extends Model
{
    public function initialize()
    {
        $this->setSource("gyms");

        $this->belongsTo('id', 'Models\User\User', 'gym_id', ['alias' => 'User']);
    }
}
