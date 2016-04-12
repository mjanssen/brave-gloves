<?php namespace Api;

use Phalcon\Http\Response;

/**
 * Class BaseController
 * @package Api;
 */
class BaseController extends \AbstractController
{
    /**
     * Initialize
     */
    public function initialize()
    {
        $this->view->disable();
    }

    /**
     * @param $status
     * @param $description
     * @param $data
     * @param string $contentType
     * @return Response
     */
    public function response($status, $description, $data, $contentType = 'application/json')
    {
        $response = new Response();
        $response->setStatusCode($status, $description);
        $response->setContentType($contentType, 'UTF-8');
        $response->setContent(json_encode($data));

        return $response;
    }
}
