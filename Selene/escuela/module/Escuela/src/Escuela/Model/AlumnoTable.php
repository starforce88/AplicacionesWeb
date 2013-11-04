<?php
namespace Escuela\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class AlumnoTable
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
	
	public function buscaAlNom($nombres, $aPaterno, $aMaterno)
	{
		if((strlen ($nombres)==0)AND(strlen ($aPaterno)>0)AND(strlen ($aMaterno)>0)){
			$resultSet = $this->tableGateway->select(array('aPaterno' => $aPaterno,'aMaterno' => $aMaterno));
			return $resultSet;
		}else if((strlen ($aPaterno)==0)AND(strlen ($nombres)>0)AND(strlen ($aMaterno)>0)){
			$resultSet = $this->tableGateway->select(array('nombres' => $nombres,'aMaterno' => $aMaterno));
			return $resultSet;
		}else if((strlen ($aMaterno)==0)AND(strlen ($aPaterno)>0)AND(strlen ($nombres)>0)){
			$resultSet = $this->tableGateway->select(array('nombres' => $nombres,'aPaterno' => $aPaterno));
			return $resultSet;
		}else if((strlen ($nombres)==0)AND(strlen ($aPaterno)==0)AND(strlen ($aMaterno)>0)){
			$resultSet = $this->tableGateway->select(array('aMaterno' => $aMaterno));
			return $resultSet;
		}else if((strlen ($nombres)==0)AND(strlen ($aMaterno)==0)AND(strlen ($aPaterno)>0)){
			$resultSet = $this->tableGateway->select(array('aPaterno' => $aPaterno));
			return $resultSet;
		}else if((strlen ($aPaterno)==0)AND(strlen ($aMaterno)==0)AND(strlen ($nombres)>0)){
			$resultSet = $this->tableGateway->select(array('nombres' => $nombres));
			return $resultSet;
		}else if((strlen ($nombres)>0)AND(strlen ($aMaterno)>0)AND(strlen ($aPaterno)>0)){
			$resultSet = $this->tableGateway->select(array('nombres' => $nombres, 'aPaterno' => $aPaterno, 'aMaterno' => $aMaterno));
			return $resultSet;
		}else if((strlen ($nombres)==0)AND(strlen ($aMaterno)==0)AND(strlen ($aPaterno)==0)){
			$resultSet = $this->tableGateway->select();
			return $resultSet;
		}
	}

    public function getAlumno($idAlumno)
    {
        $idAlumno  = (int) $idAlumno;
        $rowset = $this->tableGateway->select(array('idAlumno' => $idAlumno));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }

    public function saveAlumno(Alumno $alumno)
    {
        $data = array(
            'aPaterno'  => $alumno->aPaterno,
			'aMaterno' => $alumno->aMaterno,
			'nombres' => $alumno->nombres,
            'mail'  => $alumno->mail,
			'tipoEstudiante'  => $alumno->tipoEstudiante,
        );

        $idAlumno = (int)$alumno->idAlumno;
        if ($idAlumno == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlumno($idAlumno)) {
                $this->tableGateway->update($data, array('idAlumno' => $idAlumno));
            } else {
                throw new \Exception('Alumno idAlumno does not exist');
            }
        }
    }

    public function deleteAlumno($idAlumno)
    {
        $this->tableGateway->delete(array('idAlumno' => $idAlumno));
    }
}