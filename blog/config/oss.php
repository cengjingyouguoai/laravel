<?php
/**
 * Oss 配置文件
 */
return [
    /**
     * oss access_id
     */
    'access_id' => env('OSS_ACCESS_ID'),

    /**
     * oss_access_key
     */
    'access_key' => env('OSS_ACCESS_KEY'),

    /**
     * oss bucket
     */
    'oss_bucket' => env('OSS_BUCKET'),

    /**
     * oss_endpoint_test
     */
    'oss_endpoint' => env('OSS_ENDPOINT'),

    /**
     * oss_cnd_endpoint
     */
    'oss_cdn_endpoint' => env('OSS_CDN_ENDPOINT'),
];