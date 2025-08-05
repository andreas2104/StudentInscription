<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/EtudiantController.php',
        ]);
    }

    #[Route('/etudiants', name: 'add_etudiant', methods: ['POST'])]
    public function add(Request $request, EntityManagerInterface $em, ValidatorInterface $validator): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->json(['error' => 'Invalid JSON data'], 400);
        }

        $etudiant = new Etudiant();
        $etudiant->setNom($data['nom'] ?? '');
        $etudiant->setPrenom($data['prenom'] ?? '');
        $etudiant->setMatricule($data['matricule'] ?? '');
        $etudiant->setEmail($data['email'] ?? '');

        $errors = $validator->validate($etudiant);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[$error->getPropertyPath()] = $error->getMessage();
            }
            return $this->json(['errors' => $errorMessages], 400);
        }

        $em->persist($etudiant);
        $em->flush();

        return $this->json([
            'message' => 'Étudiant ajouté avec succès',
            'id' => $etudiant->getId()
        ], 201);
    }


    
}