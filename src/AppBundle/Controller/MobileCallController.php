<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MobileCall;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mobilecall controller.
 *
 * @Route("mobilecall")
 */
class MobileCallController extends Controller
{
    /**
     * Provides report as indicated in specs:
     *  Retrouver la durée totale réelle des appels effectués après le 15/02/2012 (inclus)
     *  Retrouver le TOP 10 des volumes data facturés en dehors de la tranche horaire
     *  8h00-18h00, par abonné.
     *  Retrouver la quantité totale de SMS envoyés par l'ensemble des abonnés
     *
     * @Route("/summary", name="mobilecall_summary")
     * @Method("GET")
     */
    public function summaryAction()
    {
        $em = $this->getDoctrine()->getManager();

        $totalCalls = $em->getRepository('AppBundle:MobileCall')->totalCalls(new DateTime("2012-02-15"));
        $mobileCalls = $em->getRepository('AppBundle:MobileCall')->getTop10OffDutyCalls();
        $totalSms = $em->getRepository('AppBundle:MobileCall')->totalSms();
                
        return $this->render('mobilecall/summary.html.twig', array(
            'total_calls' => $totalCalls,
            'mobileCalls' => $mobileCalls,
            'total_sms' => $totalSms
        ));
    }
    
    /**
     * Lists all mobileCall entities.
     *
     * @Route("/", name="mobilecall_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mobileCalls = $em->getRepository('AppBundle:MobileCall')->findAll();
        return $this->render('mobilecall/index.html.twig', array(
            'mobileCalls' => $mobileCalls,
        ));
    }

    /**
     * Creates a new mobileCall entity.
     *
     * @Route("/new", name="mobilecall_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mobileCall = new Mobilecall();
        $form = $this->createForm('AppBundle\Form\MobileCallType', $mobileCall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mobileCall);
            $em->flush();

            return $this->redirectToRoute('mobilecall_show', array('id' => $mobileCall->getId()));
        }

        return $this->render('mobilecall/new.html.twig', array(
            'mobileCall' => $mobileCall,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mobileCall entity.
     *
     * @Route("/{id}", name="mobilecall_show")
     * @Method("GET")
     */
    public function showAction(MobileCall $mobileCall)
    {
        $deleteForm = $this->createDeleteForm($mobileCall);

        return $this->render('mobilecall/show.html.twig', array(
            'mobileCall' => $mobileCall,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mobileCall entity.
     *
     * @Route("/{id}/edit", name="mobilecall_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MobileCall $mobileCall)
    {
        $deleteForm = $this->createDeleteForm($mobileCall);
        $editForm = $this->createForm('AppBundle\Form\MobileCallType', $mobileCall);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mobilecall_edit', array('id' => $mobileCall->getId()));
        }

        return $this->render('mobilecall/edit.html.twig', array(
            'mobileCall' => $mobileCall,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mobileCall entity.
     *
     * @Route("/{id}", name="mobilecall_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MobileCall $mobileCall)
    {
        $form = $this->createDeleteForm($mobileCall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mobileCall);
            $em->flush();
        }

        return $this->redirectToRoute('mobilecall_index');
    }

    /**
     * Creates a form to delete a mobileCall entity.
     *
     * @param MobileCall $mobileCall The mobileCall entity
     *
     * @return Form The form
     */
    private function createDeleteForm(MobileCall $mobileCall)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mobilecall_delete', array('id' => $mobileCall->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
