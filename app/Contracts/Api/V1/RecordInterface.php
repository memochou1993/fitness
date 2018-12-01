<?php

namespace App\Contracts\Api\V1;

interface RecordInterface
{
    public function getAllRecords();
    public function getRecord($record_key);
    public function postRecord();
    public function putRecord($record_key);
}
