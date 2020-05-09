<?php

namespace Phpactor\Indexer\Model;

use Phpactor\Name\FullyQualifiedName;

class MemberReference
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var FullyQualifiedName|null
     */
    private $name;

    /**
     * @var string
     */
    private $memberName;

    public function __construct(string $type, ?FullyQualifiedName $name, string $memberName)
    {
        $this->type = $type;
        $this->name = $name;
        $this->memberName = $memberName;
    }

    public static function create(string $type, ?string $containerFqn, string $memberName): self
    {
        return new self($type, $containerFqn ? FullyQualifiedName::fromString($containerFqn) : null, $memberName);
    }

    public function type(): string
    {
        return $this->type;
    }

    public function containerFqn(): ?FullyQualifiedName
    {
        return $this->name;
    }

    public function memberName(): string
    {
        return $this->memberName;
    }
}