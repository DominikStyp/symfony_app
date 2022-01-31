<?php

namespace App\Controller;

use App\Forms\CustomFormBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        $defaultData = [];

        $builder = $this->createFormBuilder($defaultData, ['csrf_protection' => false]);

        $form = (new CustomFormBuilder())->buildForm($builder);

        $form->submit([
            'email' => '@email.com',
            'name' => 'Joseph',
            'nickname' => 'Kovalsky Too Long Too Long lskfjsdlkj'
        ]);

        if($form->isSubmitted() && !$form->isValid()) {
            foreach($form->getErrors(true, true) as $err){
                dump($err->getMessage());
            }
        }

        exit;

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
