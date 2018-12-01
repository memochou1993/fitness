<?php

namespace App\Contracts\Api\V1;

interface RecordInterface
{
    public function getAllUserRecords();
    public function getUserRecord($record_key);
    public function postUserRecord();
    public function putUserRecord($record_key);
}
