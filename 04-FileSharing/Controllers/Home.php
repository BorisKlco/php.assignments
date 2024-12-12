<?php

namespace Controllers;

use Core\View;
use Core\Database;
use Core\File;
use DateTime;

class Home
{

    public function index()
    {
        View::show('main/index');
    }
    public function list()
    {
        $fileList = Database::query('SELECT * FROM files')->fetchAll();
        $list = [];
        foreach ($fileList as $record) {
            $expired = $record['expire_date'] ? (new \DateTime($record['expire_date']) < new \DateTime()) : false;

            $list[] = [
                'name' => $record['name'],
                'link' => $expired ? null : $record['token']
            ];
        }

        View::show('main/list', ['list' => $list]);
    }

    public function upload()
    {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            //Check File size
            $fileTooBig = $_FILES['file']['size'] > (10 * 1024 * 1024);
            //Set data for storing to db.
            $tmp = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $tempName = uniqid(bin2hex(random_bytes(20)));
            $user = $_SESSION['user']['id'] ?? null;
            $date = match ($_REQUEST['expiration']) {
                'day' => (new DateTime())->modify('+1 day')->format('Y-m-d H:i:s'),
                'week' => (new DateTime())->modify('+1 week')->format('Y-m-d H:i:s'),
                default => null
            };
            //Generate download token
            do {
                $token = bin2hex(random_bytes(8));
                $tokenExist = Database::query('SELECT id FROM files WHERE token = ?', [$token])->fetch();
            } while ($tokenExist);
        } else {
            View::error();
        }

        if ($fileTooBig) {
            View::partial('upload/wrongsize');
        }

        try {
            move_uploaded_file($tmp, FILES . $tempName);

            $q = "INSERT INTO files(name,temp,token,expire_date,user) VALUES(:name,:temp,:token,:expire_date,:user)";

            Database::query($q, [
                'name' => $fileName,
                'temp' => $tempName,
                'token' => $token,
                'expire_date' => $date,
                'user' => $user
            ]);

            View::partial('upload/ok', ['token' => $token, 'expire' => $date, 'name' => $fileName]);
        } catch (\Throwable $th) {
            View::partial('upload/error');
        }
    }

    public function download()
    {
        $id = $_REQUEST['id'] ?? null;
        $file = File::exist($id);
        View::show('main/download', $file);
    }

    public function serveFile()
    {
        $id = $_REQUEST['id'] ?? null;
        File::serve($id);
    }
}
