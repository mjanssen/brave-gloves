<?php namespace Api;

use Carbon\Carbon;
use Services\User\UserService;

/**
 * Class UserController
 * @package Api;
 */
class UserController extends BaseController
{
    /**
     * @var UserService $service
     */
    protected $service;

    public function initialize()
    {
        $this->service = new UserService();
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function getUserAction($slug)
    {
        if ($user = $this->service->getUserBySlug($slug)) {

            $data = $this->buildResponse($user);

            return $this->response(200, 'OK', $data);
        }

        return $this->response(404, 'OK', ['message' => 'User not found']);
    }

    private function buildResponse($user)
    {
        $birthDay = Carbon::createFromFormat('Y-m-d', $user->birthday);
        $age = Carbon::now()->diffInYears($birthDay);

        $averageDuration = 0;
        $averageEffective = 0;
        $deviceTotal = 0;

        if ($user->Sessions) {

            foreach ($user->Sessions as $session) {

                if ($session->duration !== null) {
                    $averageDuration += strtotime($session->duration);
                    $deviceTotal++;
                }

                if ($session->effective !== null) {
                    $averageEffective += strtotime($session->effective);
                }
            }

            $averageDuration = date('h:i:s', $averageDuration / $deviceTotal);
            $averageEffective = date('h:i:s', $averageEffective / $deviceTotal);
        }

        return [
            'slug' => $user->slug,
            'user' => [
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'age' => $age,
                'birthday' => $user->birthday,
            ],
            'gym' => [
                'name' => $user->Gym->name,
                'location' => $user->Gym->location,
            ],
            'sessions' => [
                'averages' => [
                    'session_time' => $averageDuration,
                    'effective_time' => $averageEffective
                ],
                'total' => $user->Sessions->count(),
                'items' => $user->Sessions->toArray()
            ]
        ];
    }
}
