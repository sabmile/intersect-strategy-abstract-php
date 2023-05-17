<?php

class DelStrategy extends Strategy
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function exec(array $data): array
    {
        $res = [];
        $arr = file($this->fileName);

        if (!$arr) {
            return $res;
        }

        foreach ($data as $val) {
            if ((!in_array($val, $arr))) {
                $res[] = $val;
            }
        }
        return $res;
    }
}