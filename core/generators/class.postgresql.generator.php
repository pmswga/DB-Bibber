<?php
    declare(strict_types = 1);
    namespace DbBibber\Core\Generators;

    require_once "interface.generator.php";

    class PostgreSQLGenerator implements GeneratorInterface
    {
        private $project;
        private $code;
        private $keywords;

        public function __construct()
        {
            $this->mysql_keywords = [
                'primary' => 'primary key',
                '++'      => 'serial',
                'nn'      => 'not null',
                'un'      => 'unique'
            ];
        }

        public function setProject($project)
        {
            $this->project = $project;
        }
        
        private function convertToMySQL($types)
        {
            $definition = [];
            $keywords = explode(',', $types);

            foreach ($keywords as $keyword) {
                $keyword = trim($keyword);
                if (array_key_exists($keyword, $this->mysql_keywords)) {
                    $definition[] .= $this->mysql_keywords[$keyword];
                } else {
                    $definition[] .= $keyword;
                }
            }

            return implode(' ', $definition);
        }

        public function buildDB()
        {
            $this->code .= 'CREATE DATABASE '. $this->project->get('name') .' ENCODING \''. $this->project->get('charset') .'\';';
        }

        public function buildTables()
        {
            foreach ($this->project->get('tables') as $name => $table) {
                $this->code .= 'CREATE TABLE `'. $name .'` ('.PHP_EOL;

                foreach ($table as $field => $types) {
                    $this->code .= '    '. $field .' '. $this->convertToMySQL($types);

                    if (next($table)) {
                        $this->code .= '|';
                    }
                }

                $this->code .= PHP_EOL.');';
            }

            $this->code = str_replace('|', ','.PHP_EOL, $this->code);
        }

        public function buildRelations()
        {
            foreach ($this->project->get('relations') as $name => $relation) {
                $this->code .= 'ALTER TABLE ';          
                $this->code .= ''. $relation['fst'] .' ';
                $this->code .= 'ADD CONSTRAINT '. $name .' FOREIGN KEY ('. $relation['pk'] .') ';
                $this->code .= 'REFERENCES '. $relation['snd'] .' ('. $relation['fk'] .') ';
                // $this->code .= $relation['type'];
                $this->code .= ';';
            }            
        }        

        public function getCode()
        {
            $this->buildDB();
            $this->buildTables();
            $this->buildRelations();

            return str_replace(';', ';'.PHP_EOL, $this->code);
        }

    }
