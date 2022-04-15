<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Velkuns\Codingame\Core\IO;

/**
 * Class Input
 *
 * @author Romain Cottard
 */
final class Input
{
    /**
     * @param int $length
     * @param string $lineEnd
     * @return string
     */
    public function readLine(int $length = 1025, string $lineEnd = "\n"): string
    {
        return trim((string) stream_get_line(STDIN, $length, $lineEnd));
    }

    /**
     * @param string $format
     * @return array<string|float|int>
     */
    public function read(string $format): array
    {
        return (array) fscanf(STDIN, $format);
    }

    /**
     * @return string
     */
    public function readString(): string
    {
        fscanf(STDIN, '%s', $string);

        return (string) $string;
    }

    /**
     * @return int
     */
    public function readInt(): int
    {
        fscanf(STDIN, '%d', $number);

        return (int) $number;
    }

    /**
     * @return float
     */
    public function readFloat(): float
    {
        fscanf(STDIN, '%s', $number);

        $number = str_replace(',', '.', $number);

        return (float) $number;
    }

    /**
     * @return bool
     */
    public function readBool(): bool
    {
        fscanf(STDIN, '%d', $number);

        return (bool) $number;
    }
}
