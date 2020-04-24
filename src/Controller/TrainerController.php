<?php

namespace App\Controller;

use App\Repository\TrainerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/my-api", name="my_api_")
 */
class TrainerController extends AbstractController
{
    /**
     * @Route("/trainers", name="trainer_index", methods={"GET"})
     * @param TrainerRepository $trainerRepository
     * @return JsonResponse
     */
    public function index(TrainerRepository $trainerRepository)
    {
        return $this->json($trainerRepository->findAll(), 200, [], []);
    }
}
