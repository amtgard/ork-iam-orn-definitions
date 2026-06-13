<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Allowance\Claim;

class OrkClaim extends Claim
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
