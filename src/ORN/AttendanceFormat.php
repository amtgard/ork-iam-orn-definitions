<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Catalog\ServiceCatalog;
use Amtgard\IAM\ORNFormat;

class AttendanceFormat extends ORNFormat
{

    public static function ornSegmentSchema(): array
    {
        return [
            ServiceCatalog::Configuration,
            ServiceCatalog::Game,
            ServiceCatalog::Kingdom,
            ServiceCatalog::Park,
            ServiceCatalog::Event,
            ServiceCatalog::EventInstance,
        ];
    }

    public static function getValidResourceMap($resource = null): array {
        $map = [
            "ORK" => [ "AddAttendance", "SetAttendance", "RemoveAttendance" ],
            "Classes" => [ "GetClasses", "SetClass" ]
        ];
        return $resource ? $map[$resource] : $map;
    }

}
