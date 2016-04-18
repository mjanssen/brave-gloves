<?php namespace Models\User;

use Phalcon\Mvc\Model;

/**
 * Class User
 * @package models\User;
 */
class User extends Model
{
    public function initialize()
    {
        $this->setSource("users");

        $this->hasOne('gym_id', 'Models\Gym\Gym', 'id', ['alias' => 'Gym']);
        $this->hasMany('id', 'Models\Gym\Session', 'user_id', ['alias' => 'Sessions']);
    }
}
