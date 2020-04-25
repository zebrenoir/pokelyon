<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/my-api", name="my_api_")
 */
class ApiUserController extends AbstractController
{
    /**
     * @Route("/users", name="user_index", methods={"GET"})
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function index(UserRepository $userRepository)
    {
        return $this->json($userRepository->findAll(), 200, [], []);
    }
}
