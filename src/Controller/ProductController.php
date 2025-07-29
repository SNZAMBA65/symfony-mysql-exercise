<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product', methods: ['POST'])]
    public function create(): JsonResponse
    {
        // Simuler la création d'un produit
        $product = [
            'id' => 1,
            'name' => 'Keyboard',
        ];

        return $this->json($product);
    }

    #[Route('/product/{id}', name: 'app_product_get', methods: ['GET'])]
    public function getProduct(int $id): JsonResponse
    {
        // Simuler la récupération d'un produit par id
        $product = [
            'id' => $id,
            'name' => 'Keyboard',
        ];

        return $this->json($product);
    }
}
