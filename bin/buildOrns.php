#!/usr/bin/env php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$definitionsPath = __DIR__ . '/orn_definitions.json';
$outputDir = dirname(__DIR__) . '/src/ORN';

$definitions = json_decode(file_get_contents($definitionsPath), true, 512, JSON_THROW_ON_ERROR);
$twig = new Environment(new FilesystemLoader(__DIR__));

foreach ($definitions as $defClass => $definition) {
    $formatClass = $defClass . 'Format';
    $claimClass = $defClass . 'Claim';
    $requirementClass = $defClass . 'Requirement';

    $context = [
        'formatclass' => $formatClass,
        'claimclass' => $claimClass,
        'requirementclass' => $requirementClass,
        'formatservices' => $definition['format'],
        'formatresourcemap' => $definition['resourceMap'],
    ];

    file_put_contents(
        $outputDir . "/$formatClass.php",
        "<?php\n\n" . $twig->render('format.twig', $context)
    );
    file_put_contents(
        $outputDir . "/$claimClass.php",
        "<?php\n\n" . $twig->render('claim.twig', $context)
    );
    file_put_contents(
        $outputDir . "/$requirementClass.php",
        "<?php\n\n" . $twig->render('requirement.twig', $context)
    );
}

echo "Generated ORN definitions in $outputDir\n";
