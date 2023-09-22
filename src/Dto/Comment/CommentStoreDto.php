<?php

namespace App\Dto\Comment;

use App\Entity\Comment;
use Symfony\Component\Validator\Constraints as Assert;

class CommentStoreDto
{
    #[Assert\NotBlank]
    #[Assert\Uuid]
    public $client_id;

    #[Assert\NotBlank]
    #[Assert\Email]
    public $email;

    #[Assert\Regex('/(\\+)?\\d+/')]
    public $phone_number;

    #[Assert\NotBlank]
    public $name;

    #[Assert\NotBlank]
    #[Assert\Length(max: Comment::MAX_LENGTH)]
    public $comment;
}
