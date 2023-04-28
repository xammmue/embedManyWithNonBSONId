<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id;

#[Document]
class Tree
{
    #[Id]
    private $id;
    #[EmbedMany(targetDocument: Branch::class)]
    private Collection $branches;

    public function __construct(array $branches)
    {
        $this->branches = new ArrayCollection($branches);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBranches(): array
    {
        return $this->branches->toArray();
    }
}