<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController.
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): JsonResponse
    {
        $response = $this->json(
            [
                'error' => 'Not Found',
            ]
        );

        $response->setStatusCode(404);

        return $response;
    }
}
