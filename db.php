<?php
class DataHandler {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function addRecord($record) {
        $data = $this->readData();
        $data[] = $record;
        $this->writeData($data);
    }

    public function removeAllRecords() {
        $this->writeData([]);
    }

    public function readAllRecords() {
        return $this->readData();
    }

    private function readData() {
        $jsonData = file_get_contents($this->filePath);
        return json_decode($jsonData, true);
    }

    private function writeData($data) {
        $jsonData = json_encode($data);
        file_put_contents($this->filePath, $jsonData);
    }
}
