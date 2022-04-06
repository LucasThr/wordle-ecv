<?php

declare(strict_types=1);

namespace App\Controller;

class Controller
{

  protected $template = null;

  public function __construct($template)
  {
    $this->template = $template;
  }

  public function render(array $data)
  {
    extract($data);

    ob_start();
    // include(APP_PATH . DIRECTORY_SEPARATOR . $this->template);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }
}
