<?php
namespace App\Service;
use OSS\Core\OssException;
use OSS\OssClient;
class Oss
{
    /**
     * @var
     */
    private $bucket;

    /**
     * @var
     */
    private $access_id;

    /**
     * @var
     */
    private $access_key;

    /**
     * @var
     */
    private $endpoint;

    /**
     * Oss constructor.
     */
    public function __construct()
    {
        $this->bucket = trim(config('oss.oss_bucket'));
        $this->access_id = trim(config('oss.access_id'));
        $this->access_key = trim(config('oss.access_key'));
        $this->endpoint = trim(config('oss.oss_endpoint'));
    }

    /**
     * 上传文件到Oss
     * @param string $fileName
     * @param $oss_dir
     * @return null
     * @throws OssException
     */
    public function uploadFileToOss($fileName, $oss_dir)
    {
        //验证oss_dir
        if (empty($oss_dir)) {
            die('oss_dir 不允许为空');
        }
        $ossClient = new OssClient($this->access_id, $this->access_key, $this->endpoint);
        if (!$ossClient->doesObjectExist($this->bucket, $oss_dir)) {
            $ossClient->createObjectDir($this->bucket, $oss_dir);
        }
        $ext = strrchr($fileName, '.');
        $hashFileName = sha1($fileName . time() . rand(0, 100)) . $ext;
        $hashFileNameWithPath = $oss_dir . $hashFileName;
        //随机文件名防止重复
        $result = $ossClient->uploadFile($this->bucket, $hashFileNameWithPath, $fileName);
        if (isset($result['info'])) {
            $result['info']['filename'] = $hashFileName;
        }
        return isset($result['info']) ? $result['info'] : false;
    }

    /**
     * 获取路径
     * @param $oss_file
     * @param $oss_dir
     * @return string
     */
    public function getOssUploadFileUrl($oss_file, $oss_dir)
    {
        if (empty($oss_dir) || empty($oss_file)) {
            die('oss_dir oss_file 不允许为空');
        }
        return env("OSS_CDN_ENDPOINT") . $oss_dir . $oss_file;
    }

}