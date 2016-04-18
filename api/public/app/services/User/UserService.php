<?php namespace Services\User;

use Models\User\User;

/**
 * Class UserService
 * @package Services\User;
 */
class UserService
{
    public function getUserBySlug($slug)
    {
        $user = User::findFirst([
            'conditions' => 'slug = ?1',
            'bind' => [1 => $slug]
        ]);

        return ($user) ? $user : false;
    }
}
