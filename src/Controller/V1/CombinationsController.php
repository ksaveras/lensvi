<?php

namespace App\Controller\V1;

use App\Service\CombinationResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CombinationsController.
 *
 * @Route("/v1/combinations", name="v1_combinations_")
 */
class CombinationsController extends AbstractController
{
    /**
     * @Route("/{section}/{option}", name="index")
     *
     * @param string              $section
     * @param string              $option
     * @param CombinationResolver $resolver
     *
     * @return JsonResponse
     */
    public function index(string $section, string $option, CombinationResolver $resolver): JsonResponse
    {
        return $this->json(
            [
                'option' => $option,
                'combinations' => $resolver->getOptions($section, $option),
            ]
        );
    }
}
