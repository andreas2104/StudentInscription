<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class EtudiantController extends AbstractController
{
  #[Route('/etudiant', name: 'app_etudiant')]
  public function index(): JsonResponse
  {
    return $this->json([
      'message' => 'Welcome to your new controller!',
      'path' => 'src/Controller/EtudiantController.php',
    ]);
  }

  #[Route('/addEtudiant', name: 'add_etudiant', methods: ['POST'])]
  public function add(Request $request, EntityManagerInterface $em, ValidatorInterface $validator): JsonResponse
  {
    $data = json_decode($request->getContent(), true);

    $etudiant = new Etudiant();
    $etudiant->setNom($data['nom'] ?? '');
    $etudiant->setPrenom($data['prenom'] ?? '');
    $etudiant->setMatricule($data['matricule'] ?? '');
    $etudiant->setEmail($data['email'] ?? '');

    $errors = $validator->validate($etudiant);
    if (count($errors) > 0) {
      return $this->json(['$errors' => (string) $errors], 400);
    }

    $em->persist($etudiant);
    $em->flush();

    return $this->json(['message' => 'Etudiant ajouter avec success ']);
  }
}


