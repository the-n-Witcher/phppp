<?php

class FileManager
{
    private string $directory;

    public function __construct(string $directory)
    {
        $this->directory = rtrim($directory, '/') . '/';

        if (!is_dir($this->directory)) {
            throw new InvalidArgumentException("Директория не существует: " . $this->directory);
        }
    }

    public function readFile(string $filename): string
    {
        $filepath = $this->directory . $filename;

        if (!file_exists($filepath)) {
            throw new Exception("Файл не найден: " . $filepath);
        }

        return file_get_contents($filepath);
    }

    public function writeFile(string $filename, string $data): void
    {
        $filepath = $this->directory . $filename;

        file_put_contents($filepath, $data);
    }

    public function deleteFile(string $filename): void
    {
        $filepath = $this->directory . $filename;

        if (!file_exists($filepath)) {
            throw new Exception("Файл не найден для удаления: " . $filepath);
        }

        unlink($filepath);
    }

    public function listFiles(): array
    {
        return array_diff(scandir($this->directory), array('..', '.'));
    }
}

try {
    $fileManager = new FileManager('sm');

    $fileManager->writeFile('11.txt', 'wha');

    $content = $fileManager->readFile('11.txt');
    echo "Содержимое файла: " . $content . PHP_EOL;

    $files = $fileManager->listFiles();
    echo "Файлы в директории: " . implode(', ', $files) . PHP_EOL;

    //$fileManager->deleteFile('11.txt');
    //echo "Файл удален." . PHP_EOL;

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}
