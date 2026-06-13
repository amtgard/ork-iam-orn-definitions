<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Requirement\Requirement;

class OrkRequirement extends Requirement
{

    public function ornSegmentSchema(): array
    {
        return OrkFormat::ornSegmentSchema();
    }

    protected function getResourceMap(string $resource = null): array
    {
        return OrkFormat::getValidResourceMap($resource);
    }
}
