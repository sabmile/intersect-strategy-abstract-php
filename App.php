<?php

require_once 'Strategy.php';
require_once 'File.php';

class App
{
    private string $dataFile;
    private array $data;
    private Strategy $contextStrategy;
    public File $resultFile;
    public function __construct(Strategy $contextStrategy, string $dataFile, string $resultFile)
    {
        $this->data = [];
        $this->contextStrategy = $contextStrategy;
        $this->dataFile = $dataFile;
        $this->resultFile = new File($resultFile);
    }

    public function getData(): array
    {
        return $this->data;
    }

    private function setData(): void
    {
        $data = file($this->dataFile);
        if ($data) {
            $this->data = $data;
        }
    }

    public function doBusiness(): void
    {
        $this->setData();
        $this->data = $this->contextStrategy->exec($this->data);
    }
}