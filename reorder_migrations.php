<?php

/**
 * Script to reorder Laravel migration files
 * Usage: php reorder_migrations.php
 * Place this file in your Laravel root directory and run it
 */

$migrationsPath = __DIR__ . '/database/migrations';

// Define the correct order of your tables
$correctOrder = [
    'create_type_utilisateurs_table',
    'create_utilisateurs_table',
    'create_logs_table',
    'create_type_abonnements_table',
    'create_type_etablissements_table',
    'create_etablissements_table',
    'create_abonnements_table',
    'create_annees_table',
    'create_cycles_table',
    'create_type_classes_table',
    'create_classes_table',
    'create_trimestres_table',
    'create_parents_table',
    'create_eleves_table',
    'create_inscriptions_table',
    'create_type_paiements_table',
    'create_paiements_table',
    'create_enseignants_table',
    'create_contrats_table',
    'create_matieres_table',
    'create_cours_table',
    'create_emploi_temps_table',
    'create_type_evaluations_table',
    'create_evaluations_table',
    'create_presences_table',
];

// Get all migration files
$files = glob($migrationsPath . '/*_*.php');

if (empty($files)) {
    die("No migration files found in {$migrationsPath}\n");
}

echo "Found " . count($files) . " migration files.\n\n";

// Create a mapping of table names to current file paths
$currentMigrations = [];
foreach ($files as $file) {
    $filename = basename($file);
    // Extract the migration name (everything after the timestamp)
    if (preg_match('/^\d{4}_\d{2}_\d{2}_\d{6}_(.+)\.php$/', $filename, $matches)) {
        $migrationName = $matches[1];
        $currentMigrations[$migrationName] = $file;
    }
}

// Check if all required migrations exist
$missingMigrations = [];
foreach ($correctOrder as $tableName) {
    if (!isset($currentMigrations[$tableName])) {
        $missingMigrations[] = $tableName;
    }
}

if (!empty($missingMigrations)) {
    echo "WARNING: The following migrations were not found:\n";
    foreach ($missingMigrations as $missing) {
        echo "  - {$missing}\n";
    }
    echo "\n";
}

// Rename migrations in correct order
$baseDate = '2024_01_01_';
$counter = 1;

echo "Renaming migrations...\n\n";

foreach ($correctOrder as $tableName) {
    if (isset($currentMigrations[$tableName])) {
        $oldPath = $currentMigrations[$tableName];
        $newTimestamp = $baseDate . str_pad($counter * 1000, 6, '0', STR_PAD_LEFT);
        $newFilename = $newTimestamp . '_' . $tableName . '.php';
        $newPath = $migrationsPath . '/' . $newFilename;
        
        if ($oldPath !== $newPath) {
            if (rename($oldPath, $newPath)) {
                echo "✓ Renamed: {$tableName}\n";
                echo "  From: " . basename($oldPath) . "\n";
                echo "  To:   {$newFilename}\n\n";
            } else {
                echo "✗ Failed to rename: {$tableName}\n\n";
            }
        } else {
            echo "- Skipped (already correct): {$tableName}\n\n";
        }
        
        $counter++;
    }
}

echo "\n✅ Migration reordering complete!\n";
echo "Run 'php artisan migrate' to apply migrations in the correct order.\n";