<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Allowance\Claim;

class AttendanceClaim extends Claim
{

    public function ornSegmentSchema(): array
    {
        return AttendanceFormat::ornSegmentSchema();
    }

    protected function getResourceMap(string $resource = null): array
    {
        return AttendanceFormat::getValidResourceMap($resource);
    }
}
