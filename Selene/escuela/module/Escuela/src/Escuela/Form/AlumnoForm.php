<?php
namespace Escuela\Form;

use Zend\Form\Form;

class AlumnoForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('alumno');

        $this->add(array(
            'name' => 'idAlumno',
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
            'name' => 'tipoEstudiante',
            'type' => 'Text',
            'options' => array(
                'label' => 'Tipo de curso',
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