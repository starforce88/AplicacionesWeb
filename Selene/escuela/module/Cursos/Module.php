<?php
namespace Cursos;

use Cursos\Model\Cursos;
use Cursos\Model\CursosTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	
	public function getServiceConfig() {
		return array('factories' => array(
		/****/
		'Cursos\Model\CursosTable' => function($sm) {
			$tableGateway = $sm -> get('CursosTableGateway');
			$table = new CursosTable($tableGateway);
			return $table;
		}, 'CursosTableGateway' => function($sm) {
			$dbAdapter = $sm -> get('Zend\Db\Adapter\Adapter');
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype -> setArrayObjectPrototype(new Cursos());
			return new TableGateway('cursos', $dbAdapter, null, $resultSetPrototype);
		},
		/****/

		), );
	}
	
}
