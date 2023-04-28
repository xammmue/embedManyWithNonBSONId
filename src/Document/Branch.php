<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;

#[EmbeddedDocument]
class Branch
{
    #[
        EmbedMany(
            //targetDocument: Fruit::class,
            discriminatorField: Fruit::DISCRIMINATOR_FIELD,
            discriminatorMap: Fruit::DISCRIMINATOR_MAP
        )
    ]
    private Collection $fruits;

    public function __construct(array $fruits)
    {
        $this->fruits = new ArrayCollection($fruits);
    }

    public function getFruits(): Collection
    {
        return $this->fruits;
    }
}