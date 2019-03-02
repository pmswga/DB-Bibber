<?php
    declare(strict_types=1);
    namespace DbBibber\Core;

    class Project
    {
        private $json;

        public function __construct(string $filename = "")
        {
            if (file_exists($filename)) {    
                $this->json = json_decode(file_get_contents($filename), true);
            }
        }

        public function setJson($json)
        {
            $this->json = json_decode($json, true);
        }

        public function getJson()
        {
            return $this->json;
        }

        public function get($key)
        {
            return $this->json[$key];
        }

        public function __toString()
        {
            return json_encode($this->json, JSON_PRETTY_PRINT);
        }

    }
