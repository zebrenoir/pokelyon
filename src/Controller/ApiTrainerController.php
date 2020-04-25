<?php

namespace App\Controller;

use App\Entity\Trainer;
use App\Repository\TrainerRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/my-api", name="my_api_")
 */
class ApiTrainerController extends AbstractController
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

    /**
     * @Route("/trainer", name="trainer_create", methods={"POST"})
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $em
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
    public function create(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ) {
        try {
            $data = $request->getContent();

            $trainer = $serializer->deserialize($data, Trainer::class, 'json');
            $trainer->setCreatedAt(new DateTime());

            $errors = $validator->validate($trainer);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $em->persist($trainer);
            $em->flush();

            return $this->json($trainer, 201, [], []);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ]);
        }
    }
}
