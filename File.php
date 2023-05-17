<?php

class File
{
    private string $name;
    private $filePoint;
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->filePoint = fopen($this->name, 'w');
    }

    public function __destruct()
    {
        fclose($this->filePoint);
    }

    public function write(array $data): void
    {
        if (!is_writeable($this->name)) {
            echo 'the file is not writeable';
        }
        foreach ($data as $val) {
            fwrite($this->filePoint, $val);
        }
    }
}