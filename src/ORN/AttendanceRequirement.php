<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Requirement\Requirement;

class AttendanceRequirement extends Requirement
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
