<?php

namespace Profesores\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Profesores\Model\Profesores;          // <-- Add this import
use Profesores\Form\ProfesoresForm;       // <-- Add this import

class ProfesoresController extends AbstractActionController {

    protected $profesoresTable;
	
	public function getProfesoresTable()
    {
        if (!$this->profesoresTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Profesores\Model\ProfesoresTable');
        }
        return $this->albumTable;
    }
	
	
	public function indexAction() {
		return new ViewModel(array(
            'profesores' => $this->getProfesoresTable()->fetchAll(),
        ));
	}
	
	public function addAction()
    {
		$form = new ProfesoresForm();
        $form->get('submit')->setValue('Inscribir');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $profesor = new Profesores();
            $form->setInputFilter($profesor->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $profesor->exchangeArray($form->getData());
                $this->getProfesoresTable()->saveProfesor($profesor);

                // Redirect to list of albums
                return $this->redirect()->toRoute('profesores');
            }
        }
        return array('form' => $form);
    }
	
	public function editAction()
    {
		$idProfesor = (int) $this->params()->fromRoute('id', 0);
        if (!$idProfesor) {
            return $this->redirect()->toRoute('profesores', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $profesor = $this->getProfesoresTable()->getProfesor($idProfesor);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('profesores', array(
                'action' => 'index'
            ));
        }

        $form  = new ProfesoresForm();
        $form->bind($profesor);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($profesor->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getProfesoresTable()->saveProfesor($profesor);

                // Redirect to list of albums
                return $this->redirect()->toRoute('profesores');
            }
        }

        return array(
            'id' => $idProfesor,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
		$idProfesor = (int) $this->params()->fromRoute('id', 0);
        if (!$idProfesor) {
            return $this->redirect()->toRoute('profesores');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $idProfesor = (int) $request->getPost('id');
                $this->getProfesoresTable()->deleteProfesor($idProfesor);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('profesores');
        }

        return array(
            'id'    => $idProfesor,
            'profesor' => $this->getProfesoresTable()->getProfesor($idProfesor)
        );
    }

}

