<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Velkuns\Codingame\Core;

use Velkuns\Codingame\Core\Game\GameInterface;
use Velkuns\Codingame\Core\Utils\Logger;

/**
 * Class Application
 *
 * @author Romain Cottard
 */
final class Application
{
    /** @var GameInterface $game */
    private $game;

    /** @var bool $hasLoop */
    private $hasLoop;

    public function __construct(
        GameInterface $game,
        bool $hasLoop = false
    ) {
        $this->game    = $game;
        $this->hasLoop = $hasLoop;
    }

    public function run(): void
    {
        $logger = new Logger();

        while (true) {
            try {
                $this->game->newTurn();
                $this->game->runTurn();
                $this->game->endTurn();
            } catch (\Exception $exception) {
                $logger->error($exception->getMessage());
                $this->game->endTurn();
            }

            //~ When no loop, break after first run.
            if (!$this->hasLoop) {
                break;
            }
        }
    }
}
