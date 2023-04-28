<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field;

#[EmbeddedDocument]
class Fruit
{
    public const DISCRIMINATOR_FIELD = 'type';
    public const DISCRIMINATOR_MAP = [
        'Apple' => Apple::class,
        'Mango' => Mango::class
    ];

    #[Field]
    private string $id;

    #[Field]
    private bool $ripe;

    public function __construct(string $id, bool $ripe)
    {
        $this->id = $id;
        $this->ripe = $ripe;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isRipe(): bool
    {
        return $this->ripe;
    }
}