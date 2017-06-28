<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class Homepage
{
    private $twig;
    private $log;


  /**
   *
   */
  public function __construct(
    \Twig_Environment $twig,
    \Monolog\Logger $log
    ) {
      $this->twig = $twig;
      $this->log = $log;
  }//end of function

  /**
   *
   */
  public function showIndexPageAction(): Response
  {
      $c_html = $this->twig->render('index.html.twig');

      return new Response($c_html, 201);
  }//end of function


  /**
   *
   */
  public function showTwigExample(int $example_id) : Response
  {
      if (empty($example_id)) {
          return new Response('Не известный идентификатор примера. Not found. ', 404);
      }//endif

    $c_filename = sprintf('example%03u.html.twig', $example_id);

      $c_source = 'Failed to load';
      $oLoader = $this->twig->getLoader();
      $oSource = $oLoader->getSourceContext($c_filename);

      if ($oSource instanceof \Twig_Source) {
          $a_data = array(
          'name' => 'Fabien',
          'example_id' => $example_id,
          'source_code' => $oSource->getCode(),
          'source_name' => $oSource->getName(),
          'source_path' => $oSource->getPath()
        );
      }//endif

    // page 6 of Twig manual
    if ($example_id == 1) {
        // этот объект нужно бы было передать как dependency
      $loader = new \Twig_Loader_Array(array(
        'index' => "<h1>This is example {$example_id}</h1><p>Hello from Loader Array, {{name}}</p>",
      ));
        $twig = new \Twig_Environment($loader);

        $c_html = $twig->render('index', $a_data);
        return new Response($c_html, 200);
    }//endif


    // page 6 of Twig manual
    if ($example_id == 2) {
        // этот объект нужно бы было передать как dependency
      $loader = new \Twig_Loader_Filesystem('../templates');
        $twig = new \Twig_Environment($loader);

        $c_html = $twig->render('example002.html.twig', $a_data);
        return new Response($c_html, 200);
    }//endif

    // ...




    // Все другие примеры используют экземпляр Twig_Environment полученный из Silex
    if (!empty($example_id)) {
        $c_html = $this->twig->render($c_filename, $a_data);
        return new Response($c_html, 200);
    }//endif
  }//end of function
}//end of class
