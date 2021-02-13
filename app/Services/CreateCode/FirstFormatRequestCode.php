<?php


namespace App\Services\CreateCode;


use App\Models\Supply\Request;
use App\Services\Morilog\Morilog;

/**
 * This class use for elizeh project
 *
 * Class FirstFormatRequestCode
 * @package App\Services\CreateCode
 */
class FirstFormatRequestCode implements RequestCode
{
    private $morilog;
    private $type;

    public function __construct(Morilog $morilog)
    {
        $this->morilog = $morilog->jdate()->format('Y') . '-';
    }

    public function parameters($type): RequestCode
    {
        $this->type = $type;

        return $this;
    }

    public function code()
    {
        $code = Request::query()->latest('id')->first();

        if (isset($code->code) && strlen(substr($code->code, 2)) < 4) {
            $beforeCode = substr($code->code, 2);
            $newCode = (int)$beforeCode + 1;
        } elseif (isset($code->code)) {
            $beforeCode = substr($code->code, 5);
            $newCode = (int)$beforeCode + 1;
        } else {
            $newCode = '0001';
        }
        return $this->generateCode((strlen($newCode) == 4) ? $newCode : '0' . $newCode);
    }

    protected function generateCode($newCode)
    {
        return $this->morilog . $newCode;
    }
}
