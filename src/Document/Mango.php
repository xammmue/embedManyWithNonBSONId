<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbeddedDocument;

#[EmbeddedDocument]
class Mango extends Fruit
{
    private string $mangoSpecificProperty;

    public function __construct(string $id, bool $ripe, string $mangoSpecificProperty)
    {
        parent::__construct($id, $ripe);
        $this->mangoSpecificProperty = $mangoSpecificProperty;
    }

    public function getMangoSpecificProperty(): string
    {
        return $this->mangoSpecificProperty;
    }
}