<?php


namespace App\Controller;

use App\Entity\Materiel;
use App\Repository\MaterielRepository;
use App\Service\CustomQueries;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/materiels")
 */
class MaterielController extends AbstractController {

  /**
   * @Route("/list-materiel", name="get_materiels", methods={"GET"})
   */
  public function getMateriels(CustomQueries $customQueries): JsonResponse   {

    $responseContent = $customQueries->findByGreaterThanPriceAndQuantity(30000, 30);
    return new JsonResponse($responseContent, 200, ['Content-Type' => 'application/json']);
  }

  /**
   * @Route("/list-all-materiel", name="get_all_materials", methods={"GET"})
   */
  public function getAllMaterials(MaterielRepository $materielRepository): JsonResponse {
    $responseMaterialContent = $materielRepository->getAllMateriels();
    return new JsonResponse($responseMaterialContent, 200, ['Content-Type' => 'application/json']);
  }

  /**
   * @Route("/add-new-mat", name="save_new_mat", methods={"POST"})
   */
  public function saveNewMateriel(Request $request, ManagerRegistry $mr): JsonResponse {
    $data = json_decode($request->getContent(), true);
    $materiel = new Materiel();
    $materiel->setNom($data['materielData']['materielName']);
    $materiel->setPrix($data['materielData']['pricName']);
    $entityManager = $mr->getManager();
    $entityManager->persist($materiel);
    $entityManager->flush();
    return new JsonResponse("success", 200, ['Content-Type' => 'application/json']);
  }
}