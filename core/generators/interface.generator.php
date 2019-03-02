<?php
    declare(strict_types=1);
    namespace DbBibber\Core\Generators;

    interface GeneratorInterface
    {
        public function setProject($project);

        public function buildDB();
        public function buildTables(); 
        public function buildRelations();

        public function getCode();
    }

