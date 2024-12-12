<?php

namespace Core;

use Core\Database;

class File
{
    public static function exist($token): array
    {
        try {
            $record = Database::query('SELECT * FROM files WHERE token = ?', [$token])->fetch();
            if ($record) {
                return $record;
            } else {
                header('Location: /');
                exit();
            }
        } catch (\Throwable $th) {
            header('Location: /');
            exit();
        }
    }

    public static function serve($token): void
    {
        $record = self::exist($token);

        $fileExist = file_exists(FILES . $record['temp']);
        $expired = $record['expire_date'] ? (new \DateTime($record['expire_date']) < new \DateTime()) : false;

        if ($fileExist && !$expired) {
            $file = FILES . $record['temp'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $record['name'] . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));

            ob_clean();
            flush();

            readfile($file);
            exit();
        }

        header('Location: /');
        exit();
    }
}
