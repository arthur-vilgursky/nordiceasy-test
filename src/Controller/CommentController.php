<?php

namespace App\Controller;

use App\Dto\Comment\CommentStoreDto;
use App\Service\CommentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CommentController extends AbstractController
{
    public function __construct(
        protected CommentService $commentService,
    ) {
    }

    #[Route('/comment', name: 'comment.store', methods: ['POST'])]
    public function store(
        #[MapRequestPayload] CommentStoreDto $data,
        ValidatorInterface $validator,
    ): JsonResponse {
        $errors = $validator->validate($data);
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        $comment = $this->commentService->store($data);

        return $this->json($comment, Response::HTTP_OK);
    }
}
