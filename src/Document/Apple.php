<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field;

#[EmbeddedDocument]
class Apple extends Fruit
{
    #[Field]
    private string $appleSpecificProperty;

    public function __construct(string $id, bool $ripe, string $appleSpecificProperty)
    {
        parent::__construct($id, $ripe);
        $this->appleSpecificProperty = $appleSpecificProperty;
    }

    public function getAppleSpecificProperty(): string
    {
        return $this->appleSpecificProperty;
    }
}