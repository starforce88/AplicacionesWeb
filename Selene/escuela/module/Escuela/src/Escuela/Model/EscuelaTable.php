<?php
namespace Escuela\Model;

use Zend\Db\TableGateway\TableGateway;

class EscuelaTable
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

    public function getEscuela($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveEscuela(Escuela $escuela)
    {
        $data = array(
            'artist' => $escuela->artist,
            'title'  => $escuela->title,
        );

        $id = (int)$escuela->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getEscuela($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteEscuela($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}