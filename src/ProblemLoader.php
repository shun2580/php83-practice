<?php
declare(strict_types=1);

class ProblemLoader
{
    private static ?array $cache = null;

    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }
        $dir   = __DIR__ . '/../problems';
        $files = glob($dir . '/*.php');
        sort($files);
        $problems = [];
        foreach ($files as $file) {
            $p = require $file;
            if (is_array($p)) {
                $problems[] = $p;
            }
        }
        self::$cache = $problems;
        return $problems;
    }

    public static function find(string $id): ?array
    {
        foreach (self::all() as $p) {
            if ($p['id'] === $id) return $p;
        }
        return null;
    }

    public static function byGenre(string $genre): array
    {
        return array_values(array_filter(
            self::all(),
            fn($p) => $p['genre'] === $genre
        ));
    }

    public static function genres(): array
    {
        return array_values(array_unique(array_map(fn($p) => $p['genre'], self::all())));
    }

    public static function levels(): array
    {
        return ['初級', '中級', '上級'];
    }
}
