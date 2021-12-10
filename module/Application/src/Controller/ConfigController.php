<?php
namespace Application\Controller;

use Components\Controller\AbstractConfigController;
use Laminas\Db\Sql\Sql;

class ConfigController extends AbstractConfigController
{
    /**
     * Use: Add table names to ddl array, and this function will cycle through and drop tables.
     * Example:
     *      $ddl[] = new DropTable('table_name');
     */
    public function clearDatabase()
    {
        $sql = new Sql($this->adapter);
        $ddl = [];
        
        foreach ($ddl as $obj) {
            $this->adapter->query($sql->buildSqlString($obj), $this->adapter::QUERY_MODE_EXECUTE);
        }
        
        $this->clearSettings('APPLICATION');
    }
    
    /**
     * Use: Add table creation scripts here.
     * Example:
     * 
        $ddl = new CreateTable('application_types');
        
        $ddl->addColumn(new Varchar('UUID', 36));
        $ddl->addColumn(new Integer('STATUS', TRUE));
        $ddl->addColumn(new Datetime('DATE_CREATED', TRUE));
        $ddl->addColumn(new Datetime('DATE_MODIFIED', TRUE));
        
        $ddl->addColumn(new Varchar('NAME', 100, TRUE));
        
        $ddl->addConstraint(new PrimaryKey('UUID'));
        
        $this->adapter->query($sql->buildSqlString($ddl), $this->adapter::QUERY_MODE_EXECUTE);
        unset($ddl);
     * Notes: 
     *      First four columns should be present in every table.
     */
    public function createDatabase()
    {
        $sql = new Sql($this->adapter);
        
        unset($sql);
    }
}