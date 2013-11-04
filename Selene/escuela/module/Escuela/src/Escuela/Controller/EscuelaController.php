<?php
namespace Escuela\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Escuela\Model\Alumno;          // <-- Add this import
use Escuela\Form\AlumnoForm;       // <-- Add this import
use Profesores\Model\Profesores;

class EscuelaController extends AbstractActionController
{
	protected $escuelaTable;
	protected $alumnoTable;
	protected $profesoresTable;
	
    public function indexAction()
    {
		return new ViewModel(array(
            'escuelas' => $this->getAlumnoTable()->fetchAll(),
			'profesores' => $this->getProfesoresTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
		$form = new AlumnoForm();
        $form->get('submit')->setValue('Inscribir');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $alumno = new Alumno();
            $form->setInputFilter($alumno->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $alumno->exchangeArray($form->getData());
                $this->getAlumnoTable()->saveAlumno($alumno);

                // Redirect to list of albums
                return $this->redirect()->toRoute('escuela');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
		$idAlumno = (int) $this->params()->fromRoute('id', 0);
        if (!$idAlumno) {
            return $this->redirect()->toRoute('escuela', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $alumno = $this->getAlumnoTable()->getAlumno($idAlumno);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('escuela', array(
                'action' => 'index'
            ));
        }

        $form  = new AlumnoForm();
        $form->bind($alumno);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($alumno->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAlumnoTable()->saveAlumno($alumno);

                // Redirect to list of albums
                return $this->redirect()->toRoute('escuela');
            }
        }

        return array(
            'id' => $idAlumno,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
		$idAlumno = (int) $this->params()->fromRoute('id', 0);
        if (!$idAlumno) {
            return $this->redirect()->toRoute('alumno');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $idAlumno = (int) $request->getPost('id');
                $this->getAlumnoTable()->deleteAlumno($idAlumno);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('escuela');
        }

        return array(
            'id'    => $idAlumno,
            'alumno' => $this->getAlumnoTable()->getAlumno($idAlumno)
        );
    }
	
	public function getEscuelaTable()
    {
        if (!$this->escuelaTable) {
            $sm = $this->getServiceLocator();
            $this->escuelaTable = $sm->get('Escuela\Model\EscuelaTable');
        }
        return $this->escuelaTable;
    }
	
	public function getAlumnoTable()
    {
        if (!$this->alumnoTable) {
            $sm = $this->getServiceLocator();
            $this->alumnoTable = $sm->get('Escuela\Model\AlumnoTable');
        }
        return $this->alumnoTable;
    }
	
	public function getProfesoresTable()
    {
        if (!$this->profesoresTable) {
            $sm = $this->getServiceLocator();
            $this->profesoresTable = $sm->get('Profesores\Model\ProfesoresTable');
        }
        return $this->profesoresTable;
    }
}