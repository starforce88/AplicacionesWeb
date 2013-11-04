<?php
namespace Profesores\Form;

use Zend\Form\Form;

class ProfesoresForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('profesor');

        $this->add(array(
            'name' => 'idProfesor',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'aPaterno',
            'type' => 'Text',
            'options' => array(
                'label' => 'Apellido Paterno',
            ),
        ));
		$this->add(array(
            'name' => 'aMaterno',
            'type' => 'Text',
            'options' => array(
                'label' => 'Apellido Materno',
            ),
        ));
        $this->add(array(
            'name' => 'nombres',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nombre(s)',
            ),
        ));
		$this->add(array(
            'name' => 'mail',
            'type' => 'Text',
            'options' => array(
                'label' => 'e-mail',
            ),
        ));
		$this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}