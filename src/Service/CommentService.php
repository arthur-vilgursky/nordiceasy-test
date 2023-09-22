<?php

namespace App\Service;

use App\Dto\Comment\CommentStoreDto;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManager;

class CommentService
{
    public function __construct(
        protected CommentRepository $commentRepository,
        protected EntityManager $entityManager,
    ) {
    }

    public function store(CommentStoreDto $data): Comment
    {
        $comment = new Comment();

        $comment->setClientId($data->client_id);
        $comment->setEmail($data->email);
        $comment->setPhoneNumber($data->phone_number);
        $comment->setName($data->name);
        $comment->setComment($data->comment);

        $this->entityManager->persist($comment);

        return $comment;
    }
}
