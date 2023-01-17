<?php

namespace pkpudev\graph;

use Microsoft\Graph\Model\Drive;
use Microsoft\Graph\Model\DriveItem;
use Microsoft\Graph\Model\File;

trait DriveTrait
{
    /**
     * Get Drives from a user by userId
     *
     * @param string $userId User ID
     * @param int $limit Search Limit, Default to 10
     * @return Drive[] List of Drives
     */
    public function getDrives($userId, $limit = 10)
    {
        $drives = $this->graph
            ->createRequest("GET", sprintf('/users/%s/drives?$top=%s', $userId, $limit))
            ->setReturnType(Drive::class)
            ->execute();
        return $drives;
    }

    /**
     * Get Folders from a user by path
     *
     * @param string $userId User ID
     * @param string $path Folder Location
     * @param int $limit Search Limit, Default to 10
     * @return DriveItem[] List of DriveItems
     */
    public function getFolders($userId, $path, $limit = 10)
    {
        $folders = $this->graph
            ->createRequest("GET", sprintf('/users/%s/drive/root:/%s:/children?$top=%s', $userId, $path, $limit))
            ->setReturnType(DriveItem::class)
            ->execute();
        return $folders;
    }

    /**
     * Get Files from a user by path
     *
     * @param string $userId User ID
     * @param string $path Folder Location
     * @param int $limit Search Limit, Default to 10
     * @return File[] List of Files
     */
    public function getFiles($userId, $path, $limit = 10)
    {
        $files = $this->graph
            ->createRequest("GET", sprintf('/users/%s/drive/root:/%s:/children?$top=%s', $userId, $path, $limit))
            ->setReturnType(File::class)
            ->execute();
        return $files;
    }
}