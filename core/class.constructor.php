<?php
    declare(strict_types=1);
    namespace DbBibber\Core;

    require_once "generators/class.generator.php";

    use DbBibber\Core\Generators\Generator;

    class Constructor
    {
        private $project;
        private $generator;
        private $seeders;
        private $pdo;

        public function __construct()
        {
            $this->db_types = ['mysql', 'mssql', 'postgresql'];
        }

        public function setProject($project)
        {
            $this->project = $project;
            $this->generator = new Generator();
            $this->generator->setProject($project);

            $type = $project->get('type');

            if (in_array($type, $this->db_types)) {
                switch ($type)
                {
                    case 'mysql':
                    {
                        $this->pdo = new \PDO('mysql:dbname=;host='. $project->get('host'), $project->get('user'), $project->get('pass')); 
                    } break;
                    case 'mssql';
                    {
                        $this->pdo = null;
                    } break;
                    case 'postgresql';
                    {
                        $this->pdo = null;
                    } break;
                }
            }
        }

        public function get($key)
        {
            return $this->project->get($key);
        }

        public function seeders()
        {

        }

        public function generate()
        {
            return $this->generator->generate();
        }

        public function exec()
        {
            return $this->pdo->exec($this->generator->generate());
        }

        public function isTableExists($table)
        {
            if (!empty($this->pdo)) {
                $isTableExists = $this->pdo->query('SHOW TABLES FROM `'. $this->project->get('name') .'` LIKE  \''. $table .'\'');
    
                if (!empty($isTableExists)) {
                    $result = $isTableExists->fetchAll()[0][0];
                    if ($result != null) {
                        return \strtolower($result) == \strtolower($table);
                    }
                }

            }
            return false;
        }

        public function isRelationExists($relation)
        {
            if (!empty($this->pdo)) {
                $isRelationExists = $this->pdo->query('SELECT DISTINCT(constraint_name) FROM information_schema.table_constraints WHERE constraint_schema = \''. $this->project->get('name') .'\' AND constraint_name=\''. $relation .'\' ORDER BY constraint_name ASC');

                if (!empty($isRelationExists)) {
                    $result = $isRelationExists->fetchAll()[0][0];
                    if ($result != null) {
                        return \strtolower($result) == \strtolower($relation);
                    }
                }

            }
            return false;
        }

        public function construct()
        {
            // $this->constructor->getCode();
        }

    }
