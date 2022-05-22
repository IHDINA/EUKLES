<?php


namespace App\Controller;

use App\Repository\ClientRepository;
use App\Service\CustomQueries;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/clients/")
 */
class ClientController extends AbstractController {

  /**
   * @Route("list-all-clients", name="get_all_clients", methods={"GET"})
   */
  public function getClients(ClientRepository $clientRepository): JsonResponse {
    $responseContent = $clientRepository->getAllClients();
    return new JsonResponse($responseContent, 200, ['Content-Type' => 'application/json']);
  }

  /**
   * @Route("rentable-client", name="get_rentable_clients", methods={"GET"})
   */
  public function getRentableClients(CustomQueries $customQueries): JsonResponse {
    $responseContent = $customQueries->getRentableClient();
    return new JsonResponse($responseContent, 200, ['Content-Type' => 'application/json']);
  }
}