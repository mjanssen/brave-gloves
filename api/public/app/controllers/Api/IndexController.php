<?php

/**
 * Class IndexController
 */
class IndexController extends AbstractController
{
    public function indexAction()
    {
        $data = [
            'gains',
            'sdfsdf'
        ];

        return $this->response(200, 'OK', $data);
    }
}
