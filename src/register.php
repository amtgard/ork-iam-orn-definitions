<?php

use Amtgard\IAM\Catalog\ServiceCatalog;
use Amtgard\IAM\Definitions\ORN\AttendanceClaim;
use Amtgard\IAM\Definitions\ORN\AttendanceRequirement;
use Amtgard\IAM\Definitions\ORN\OrkClaim;
use Amtgard\IAM\Definitions\ORN\OrkRequirement;
use Amtgard\IAM\ORN\OrnClassMap;

OrnClassMap::registerClaim(ServiceCatalog::Attendance, AttendanceClaim::class);
OrnClassMap::registerClaim(ServiceCatalog::ORK, OrkClaim::class);
OrnClassMap::registerRequirement(ServiceCatalog::Attendance, AttendanceRequirement::class);
OrnClassMap::registerRequirement(ServiceCatalog::ORK, OrkRequirement::class);
