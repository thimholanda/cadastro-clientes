<?php

namespace codeeducation\Database;

class DatabasePersist implements DatabasePersistInterface
{
    private $pdo;
    private $arrObjPersist = array();
    private $table;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    public function persist(DatabaseModelInterface $model)
    {
        array_push($this->arrObjPersist, $model);
    }

    /**
     * @return array
     */
    public function getArrObjPersist(): array
    {
        return $this->arrObjPersist;
    }

    public function flush()
    {
        $arrObjSpl = new \ArrayObject($this->arrObjPersist);

        foreach ($arrObjSpl as $obj)
        {
            $clienteData = $obj->getAll();

            $colunas = implode(', ', array_keys($clienteData));

            $params = array();

            foreach ($clienteData as $key => $value)
            {
                $params[':'.$key] = $value;
            }

            $paramsKeys = implode(', ', array_keys($params));

            try
            {
                $query = $this->pdo->prepare("INSERT INTO $this->table ($colunas) VALUES ($paramsKeys)");

                foreach ($params as $key => &$value)
                {
                    $query->bindParam($key, $value);
                }

                $query->execute();
            }
            catch (\PDOException $e)
            {
                die($e->getMessage());
            }
        }

    }

    /**
     * @return mixed
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }


}