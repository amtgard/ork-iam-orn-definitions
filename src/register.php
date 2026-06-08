<?php

use Amtgard\IAM\Definitions\ORN\AttendanceClaim;
use Amtgard\IAM\Definitions\ORN\AttendanceRequirement;
use Amtgard\IAM\Definitions\ORN\OrkClaim;
use Amtgard\IAM\Definitions\ORN\OrkRequirement;
use Amtgard\IAM\ORN\OrnClassMap;
use Amtgard\IAM\OrkServices;

OrnClassMap::registerClaim(OrkServices::Attendance, AttendanceClaim::class);
OrnClassMap::registerClaim(OrkServices::ORK, OrkClaim::class);
OrnClassMap::registerRequirement(OrkServices::Attendance, AttendanceRequirement::class);
OrnClassMap::registerRequirement(OrkServices::ORK, OrkRequirement::class);
