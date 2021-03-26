<?php declare(strict_types=1);

namespace App\DTO\V1\V1_0\Task;

use App\DTO\Contracts\Task\TaskInterface;
use App\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Kcs\Serializer\Annotation as Serializer;
use Solido\PatchManager\PatchManagerInterface;
use Solido\Symfony\Annotation\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class Task implements TaskInterface
{

    /** @var string */
    //#[Assert\NotBlank]
    //#[Assert\Length(max: 150)]
    public $title;

    /** @var string */
    public $kind;


    public function get(Entity\Task $task): self
    {
        $this->entity = $task;
        $this->title = $task->getTitle();
        $this->kind = $task->getKind();

        return $this;
    }

}
