<?php

namespace App\Controller\V2;

use App\Service\PairResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CombinationsController.
 *
 * @Route("/v2/combinations", name="api_v2_combinations_")
 */
class CombinationsController extends AbstractController
{
    /**
     * @Route("/first/{option}", name="first")
     *
     * @param string       $option
     * @param PairResolver $resolver
     *
     * @return JsonResponse
     */
    public function first(string $option, PairResolver $resolver): JsonResponse
    {
        return $this->json(
            [
                'option' => $option,
                'combinations' => $resolver->getPrimary($option),
            ]
        );
    }

    /**
     * @Route("/second/{option}", name="second")
     *
     * @param string       $option
     * @param PairResolver $resolver
     *
     * @return JsonResponse
     */
    public function second(string $option, PairResolver $resolver): JsonResponse
    {
        return $this->json(
            [
                'option' => $option,
                'combinations' => $resolver->getSecondary($option),
            ]
        );
    }
}
