<?php

namespace Petlost\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Petlost\FrontBundle\Form\MascotaType;
use Petlost\FrontBundle\Entity\Mascota;
use Petlost\FrontBundle\Entity\Foto;
use Petlost\FrontBundle\Form\FotoType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }
    
    public function addmascotaAction() {
        $mascota=new Mascota();
        
        $form=  $this->createForm(new MascotaType(),$mascota);
        $request=  $this->getRequest();
        $em=  $this->getDoctrine()->getManager();
        if($request->getMethod()=="POST")
        {
            $form->bind($request);
            if($form->isValid())
            {
                
                $mascota=$form->getData();
                $fotos=$mascota->getFotos();
                
                foreach ($fotos as $galeria) {
                    $galeria->subirFoto($this->container->getParameter('pet.directorio.imagenes'));
                    $galeria->setMascota($mascota);
                }
                $em->persist($mascota);
                
                $em->flush();
                return $this->redirect($this->generateUrl('front_homepage'));

            }
            
        }
        
        return $this->render('FrontBundle:Default:addmascota.html.twig',array(
            'formm'=>$form->createView()
        ));
        
    }
    
    public function addanuncioAction() {
        return $this->render('FrontBundle:Default:addanuncio.html.twig');
    }
}
 