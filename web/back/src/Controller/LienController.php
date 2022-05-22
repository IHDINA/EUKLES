<?php


namespace App\Controller;


use App\Entity\Lien;
use App\Repository\ClientRepository;
use App\Repository\MaterielRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/liens")
 */
class LienController extends AbstractController {

  /**
   * @Route("/add-new-record", name="save_new_lien", methods={"POST"})
   */
  public function getClients (ClientRepository $clientRepository, MaterielRepository $materielRepository, Request $request, ManagerRegistry $mr): JsonResponse {
    $data = json_decode($request->getContent(), true);
    $client = $clientRepository->findOneBy(['id' => $data['lienData']['clientListName']]);
    $materiel = $materielRepository->findOneBy(['id' => $data['lienData']['materielListName']]);
    $lien = new Lien();
    $lien->setClient($client);
    $lien->setMateriel($materiel);
    $lien->setQte($data['lienData']['quantityName']);
    $entityManager = $mr->getManager();
    $entityManager->persist($lien);
    $entityManager->flush();
    return new JsonResponse('success', 200, ['Content-Type' => 'application/json']);
  }
}