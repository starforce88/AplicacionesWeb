<?php
namespace Profesores\Model;

use Zend\Db\TableGateway\TableGateway;

class ProfesoresTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

	public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getProfesor($idProfesor)
    {
        $idProfesor  = (int) $idProfesor;
        $rowset = $this->tableGateway->select(array('idProfesor' => $idProfesor));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }

    public function saveProfesor(Profesores $profesor)
    {
        $data = array(
            'aPaterno'  => $profesor->aPaterno,
			'aMaterno' => $profesor->aMaterno,
			'nombres' => $profesor->nombres,
            'mail'  => $profesor->mail,
        );

        $idProfesor = (int)$profesor->idProfesor;
        if ($idProfesor == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getProfesor($idProfesor)) {
                $this->tableGateway->update($data, array('idProfesor' => $idProfesor));
            } else {
                throw new \Exception('Profesor idProfesor does not exist');
            }
        }
    }

    public function deleteProfesor($idProfesor)
    {
        $this->tableGateway->delete(array('idProfesor' => $idProfesor));
    }
    
}