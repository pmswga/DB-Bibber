<?php
    declare(strict_types = 1);
    namespace DbBibber\Core\Seeders;

    class MySQLSeeder
    {
        private $project;

        public function __construct()
        {

        }

        public function setProject($project)
        {
            $this->project = $project;
        }

        public function insert($table, $data)
        {
            foreach ($data as $name => $row) {
                foreach ($row as $field) {
                    echo $field;
                }
                echo '<br>';
            }
        }

        public function run()
        {

        }

    }

