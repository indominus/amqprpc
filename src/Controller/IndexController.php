<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(\Psr\Container\ContainerInterface $container)
    {
        $msg = array('user_id' => 1235, 'image_path' => '/path/to/new/pic.png');
        $container->get('old_sound_rabbit_mq.upload_picture_producer')->publish(serialize($msg));

        return $this->json([
                'message' => 'Welcome to your new controller!',
                'path' => 'src/Controller/IndexController.php',
        ]);
    }
}
