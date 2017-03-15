<?php
require_once "Vcode.php";

$vcodeImg = new VcodeImg;
$vcodeImg->showClickTypeImg();
// $vcodeImg -> showNumberTypeImg();
// $vcodeImg -> showMixTypeImg();

class VcodeImg
{
    private $verify;
    private $data_save_path = __DIR__ . "/text.txt";

    public function showNumberTypeImg()
    {
        $this->verify = new Vcode("num", 5, 16, null, 70);
    }

    public function showMixTypeImg()
    {
        $this->verify = new Vcode();
    }

    public function showClickTypeImg()
    {
        $this->verify = new Vcode('img', 2, 18, 150, 250, false, true, 0, 0, "./src/img/" . mt_rand(1, 19) . ".jpg", './src/font/msyhbd.ttc', [255, 250, 250]);
    }

    private function saveJsonDataToFile()
    {
        file_put_contents($this->data_save_path, json_encode($this->verify->getData()));
    }

    public function __destruct()
    {
        $this->saveJsonDataToFile();
        $this->verify->show();
    }
}
