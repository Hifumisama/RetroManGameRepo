<?php
// src/OC/UserBundle/RMGUserBundle.php

namespace UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OCUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
