<?php

/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * .........<-..(`-')_..(`-').._(`-').._....(`-').
 * ...<-.......\(.OO).).(.OO).-/(OO.).-/.<-.(OO.).
 * .,--..)..,--./.,--/.(,------./.,---...,------,)
 * .|..(`-')|...\.|..|..|...---'|.\./`.\.|.../`..'
 * .|..|OO.)|....'|..|)(|..'--..'-'|_.'.||..|_.'.|
 * (|..'__.||..|\....|..|...--'(|...-...||.......'
 * .|.....|'|..|.\...|..|..`---.|..|.|..||..|\..\.
 * .`-----'.`--'..`--'..`------'`--'.`--'`--'.'--'
 */



namespace Lame\Marco;

class PrefixMap extends \ArrayObject
{


    public function __construct(string ...$toSplit)
    {
        parent::__construct();
        $this->offsetSet('__root__', []);
        $this->splitImpl($toSplit);

    }

    public function root()
    {
        return $this->offsetGet('__root__');
    }

    public function add($key, $value)
    {
        if (!$this->offsetExists($key)) {
            $this->offsetSet($key, [$value]);
        } else {
            $c   = $this->offsetGet($key);
            $c[] = $value;
            $this->offsetSet($key, $c);
        }
        return $this;
    }

    public function rootify($key)
    {
        $c   = $this->offsetGet('__root__');
        $c[] = $key;
        $this->offsetSet('__root__', $c);
        return $this;
    }

    public function split($toSplit)
    {
        $this->splitImpl($toSplit);
        return $this;
    }

    public function walk($callback)
    {
        foreach ($this as $key => $value) {
            $callback($key, $value);
        }
        return $this;
    }

    public function toObject()
    {
        $object = [];
        foreach ($this as $key => $value) {
            $object[$key] = $value;
        }
        return $object;
    }

    public function toJSONString()
    {
        return json_encode($this->toObject());
    }

    private function splitImpl($toSplit)
    {
        foreach ($toSplit as $str) {
            $split = explode(':', $str);
            if (count($split) === 1) {
                $this->rootify($split[0]);
            } else if (count($split) === 2) {
                $this->add($split[0], $split[1]);
            } else {
                [$key, $value] = [array_shift($split), array_pop($split)];
                $this->add($key, $value);
                foreach ($split as $k) {
                    $this->add($k, $value);
                }
            }
        }
    }

    public function export()
    {
        $o = [];
        foreach ($this as $key => $value) {
            $o[$key] = $value;
        }
        return $o;
    }
}
