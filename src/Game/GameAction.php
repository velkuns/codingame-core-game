<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Velkuns\Codingame\Core\Game;

/**
 * Class Action
 *
 * @author Romain Cottard
 */
class GameAction
{
    /** @var string[] $actions  */
    protected $actions;

    /** @var string $separator */
    protected $separator;

    /** @var string|string[] $default */
    protected $default;

    /**
     * Action constructor.
     *
     * @param string|string[] $default
     * @param string $separator
     */
    public function __construct($default = 'PASS', string $separator = ';')
    {
        $this->actions   = [];
        $this->separator = $separator;
        $this->default   = $default;
    }

    /**
     * @return $this
     */
    public function reset(): self
    {
        $this->actions = [];

        return $this;
    }

    /**
     * @param string|string[] $action
     * @param string $separator
     * @return $this
     */
    public function add($action, string $separator = ' '): self
    {
        $this->actions[] = is_array($action) ? implode($separator, $action) : $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsString(): string
    {
        if (empty($this->actions)) {
            $this->add($this->default);
        }

        return implode($this->separator, $this->actions);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getAsString();
    }
}
