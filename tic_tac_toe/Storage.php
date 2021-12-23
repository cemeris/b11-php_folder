<?php
class Storage
{
    private $data = [];
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            $json_data = file_get_contents($this->filename);
            $data = json_decode($json_data, true);
            if (is_array($data)) {
                $this->data = $data;
            }
        }
    }

    public function getEntry($key) {
        return @$this->data[$key];
    }
    
    public function addEntry($key, $value) {
        if (!isset($this->data[$key])) {
            $this->data[$key] = $value;
            file_put_contents($this->filename, json_encode($this->data));
        }
    }

    public function countEntries() {
        return count($this->data);
    }
}