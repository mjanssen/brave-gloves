<?php namespace Api;

/**
 * Class IndexController
 */
class IndexController extends BaseController
{
    public function indexAction()
    {
        $data = [
            'application' => [
                'name' => 'Brave Gloves'
            ]
        ];

        return $this->response(200, 'OK', $data);
    }
}
