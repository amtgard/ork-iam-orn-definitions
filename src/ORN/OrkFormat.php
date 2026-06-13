<?php

namespace Amtgard\IAM\Definitions\ORN;

use Amtgard\IAM\Catalog\ServiceCatalog;
use Amtgard\IAM\ORNFormat;

class OrkFormat extends ORNFormat
{

    public static function ornSegmentSchema(): array
    {
        return [
            ServiceCatalog::Configuration,
            ServiceCatalog::Game,
            ServiceCatalog::Kingdom,
            ServiceCatalog::Park,
            ServiceCatalog::Event,
        ];
    }

    public static function getValidResourceMap($resource = null): array {
        $map = [
            "ORK" => [ "AddKingdom" ]
        ];
        return $resource ? $map[$resource] : $map;
    }

}
