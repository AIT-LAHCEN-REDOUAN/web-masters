<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorld
{

    #[Route("/lucky/number")]
  public function number():Response
  {
      $number= random_int(0,100);
      return new Response(
          "<html>
<body>
<h1> Lucky Number :" .$number."</h1>
</body>
</html>"
      );
  }
}