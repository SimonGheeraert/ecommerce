<?php

namespace Pizza\shopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pizza\shopBundle\Entity\TelList;
use Pizza\shopBundle\Form\TelListType;

/**
 * TelList controller.
 *
 * @Route("/tellist")
 */
class TelListController extends Controller
{

    /**
     * Lists all TelList entities.
     *
     * @Route("/", name="tellist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PizzashopBundle:TelList')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TelList entity.
     *
     * @Route("/", name="tellist_create")
     * @Method("POST")
     * @Template("PizzashopBundle:TelList:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TelList();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tellist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TelList entity.
     *
     * @param TelList $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TelList $entity)
    {
        $form = $this->createForm(new TelListType(), $entity, array(
            'action' => $this->generateUrl('tellist_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TelList entity.
     *
     * @Route("/new", name="tellist_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TelList();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TelList entity.
     *
     * @Route("/{id}", name="tellist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PizzashopBundle:TelList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TelList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TelList entity.
     *
     * @Route("/{id}/edit", name="tellist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PizzashopBundle:TelList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TelList entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TelList entity.
    *
    * @param TelList $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TelList $entity)
    {
        $form = $this->createForm(new TelListType(), $entity, array(
            'action' => $this->generateUrl('tellist_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TelList entity.
     *
     * @Route("/{id}", name="tellist_update")
     * @Method("PUT")
     * @Template("PizzashopBundle:TelList:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PizzashopBundle:TelList')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TelList entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tellist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TelList entity.
     *
     * @Route("/{id}", name="tellist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PizzashopBundle:TelList')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TelList entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tellist'));
    }

    /**
     * Creates a form to delete a TelList entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tellist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
