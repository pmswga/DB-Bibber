<?php
    declare(strict_types=1);
    namespace DbBibber\Core\Generators;

    require_once "class.mysql.generator.php";
    require_once "class.mssql.generator.php";
    require_once "class.postgresql.generator.php";

    class Generator
    {
        private $db_types;
        private $generator;
        private $project;

        public function __construct()
        {
            $this->db_types = ['mysql', 'mssql', 'postgresql'];
        }

        public function setProject($project)
        {
            $type = $project->get('type');

            if (in_array($type, $this->db_types)) {
                switch ($type)
                {
                    case 'mysql':
                    {
                       $this->generator = new MySQLGenerator(); 
                    } break;
                    case 'mssql';
                    {
                        $this->generator = new MSSQLGenerator();
                    } break;
                    case 'postgresql';
                    {
                        $this->generator = new PostgreSQLGenerator();
                    } break;
                }
            }

            $this->generator->setProject($project);
        }

        public function generate()
        {
            return $this->generator->getCode();
        }

    }
