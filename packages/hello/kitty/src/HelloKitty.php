<?php

namespace Hello\Kitty;

class HelloKitty {
  public static function says(bool $happy): string
  {
    return $happy == true ? 'purr purr' : 'sod off, perv!';
  }
}
