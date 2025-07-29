<?php
 
namespace Hermosura\GS\Core;

class DataStore
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
        
        if (filesize($this->filePath) === 0) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function getConnection(): array
    {
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?? [];
    }
}
