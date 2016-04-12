<?php namespace Api;

/**
 * Class IndexController
 */
class IndexController extends BaseController
{
    public function indexAction()
    {
        $data = [
            'test2',
            'test'
        ];

        return $this->response(200, 'OK', $data);
    }
}
