<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Allowance\Claim;

class OrkClaim extends Claim
{

    protected function serviceFormat(): array
    {
        return OrkFormat::serviceFormat();
    }

    protected function getResourceMap(string $resource = null): array
    {
        return OrkFormat::getValidResourceMap($resource);
    }
}
