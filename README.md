# ork-iam-orn-definitions

Standard ORN definition classes for ORK IAM. This package depends on [amtgard/ork-iam](https://github.com/amtgard/ork-iam) and is **optional** — use it when you want the built-in Attendance and ORK schemas without writing your own.

## Installation

```bash
composer require amtgard/ork-iam amtgard/ork-iam-orn-definitions
```

### Version lines

| Line | Branch | Pair with `ork-iam` | Composer constraint | Latest tag |
|------|--------|---------------------|---------------------|------------|
| 1.x (maintenance) | `1.x` | `"amtgard/ork-iam": "^1.4"` | `"amtgard/ork-iam-orn-definitions": "^1.0"` | `v0.9.0` |
| 2.x (current) | `main` | `"amtgard/ork-iam": "^2.1"` | `"amtgard/ork-iam-orn-definitions": "^2.0"` | *(pending `v2.0.0`)* |

Pin the definitions package to the same major line as `ork-iam`. Do not mix `ork-iam` 1.x with definitions 2.x (or vice versa).

### Branching

- **1.x fixes** — branch from `1.x`, name `feature/1.x/<name>`, open PRs against `1.x`. Tag releases `v1.0.0`, `v1.1.0`, … on `1.x`.
- **2.x features** — branch from `main`, name `feature/<name>`, open PRs against `main`. Tag releases `v2.0.0`, `v2.1.0`, … on `main`.

On autoload, `src/register.php` registers claim and requirement classes with `OrnClassMap`. No additional bootstrap is required.

## Included definitions

Schemas are defined in `bin/orn_definitions.json` and generated into `src/ORN/`.

| Service | Classes |
|---------|---------|
| Attendance | `AttendanceFormat`, `AttendanceClaim`, `AttendanceRequirement` |
| ORK | `OrkFormat`, `OrkClaim`, `OrkRequirement` |

All generated classes live in the `Amtgard\IAM\Definitions\ORN` namespace.

### Attendance

- **Provisos:** Configuration, Game, Kingdom, Park, Event, EventInstance
- **Resources:** `ORK/AddAttendance`, `ORK/SetAttendance`, `ORK/RemoveAttendance`, `Classes/GetClasses`, `Classes/SetClass`

### ORK

- **Provisos:** Configuration, Game, Kingdom, Park, Event
- **Resources:** `ORK/AddKingdom`

## Usage

Once installed, use `ork-iam` factories and definition classes as usual:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Amtgard\IAM\ClaimFactory;
use Amtgard\IAM\Definitions\ORN\AttendanceRequirement;
use Amtgard\IAM\OrkServices;

$claim = ClaimFactory::createOrn('Attendance:*::::::ORK/AddAttendance');
$requirement = new AttendanceRequirement(OrkServices::Attendance, 'Attendance:1:2:3:4:5:6:ORK/AddAttendance');

if ($requirement->allows($claim)) {
    // allowed
}
```

## Custom definitions instead

You do not need this package if you maintain your own ORN classes. See the **ORN definitions** section in the [ork-iam README](https://github.com/amtgard/ork-iam) for how to extend `Claim` / `Requirement` and register them with `OrnClassMap`.

## Development

```bash
composer install
composer build
```

`composer build` regenerates `src/ORN/*` from `bin/orn_definitions.json` and Twig templates in `bin/`. Edit the JSON and templates, then rebuild — do not hand-edit generated files under `src/ORN/`.

### Layout

- `bin/orn_definitions.json` — service ORN schemas (source of truth)
- `bin/*.twig` — codegen templates
- `bin/buildOrns.php` — generator script
- `src/ORN/` — generated `*Format`, `*Claim`, and `*Requirement` classes
- `src/register.php` — registers definitions with `OrnClassMap` on autoload
