<?php
namespace Escuela;

use Escuela\Model\Escuela;
use Escuela\Model\EscuelaTable;
use Escuela\Model\Alumno;
use Escuela\Model\AlumnoTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Escuela\Model\AlumnoTable' =>  function($sm) {
                    $tableGateway = $sm->get('AlumnoTableGateway');
                    $table = new AlumnoTable($tableGateway);
                    return $table;
                },
                'AlumnoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Alumno());
                    return new TableGateway('alumnos', $dbAdapter, null, $resultSetPrototype);
                },
				'Profesores\Model\ProfesoresTable' => function($sm) {
					$tableGateway = $sm -> get('ProfesoresTableGateway');
					$table = new ProfesoresTable($tableGateway);
					return $table;
				},
				'ProfesoresTableGateway' => function($sm) {
					$dbAdapter = $sm -> get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype -> setArrayObjectPrototype(new Profesores());
					return new TableGateway('profesores', $dbAdapter, null, $resultSetPrototype);
		},
            ),
        );
    }
}