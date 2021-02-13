<?php


namespace App\Services\CreateCode;


use App\Models\Baseinfo;
use App\Models\Supply\Request;

class SecondFormatRequestCode implements RequestCode
{
    private $firstNumber = [
        '1' => '701',
        '2' => '501',
        '3' => '601'
    ];

    private $unitRequesterId;

    public function code()
    {
        return $this->generateCode();
    }

    public function parameters($parameters): RequestCode
    {
        $this->unitRequesterId = $parameters['unit_requester_id'];

        return $this;
    }

    protected function generateCode()
    {
        $code = Request::query()
            ->where('unit_requester_id', $this->unitRequesterId)
            ->where('code', '<>', '')
            ->where('project_id', '=', projectInf()->id)
            ->latest('code')->first();


        if ($code) {
            $counter = (int)substr($code->code, -5) + 1;
            return $this->firstNumber[projectInf()->id] . $this->getBaseCode()->code . $this->fixFormat($counter);

        } else {

            return $this->firstNumber[projectInf()->id] . $this->getBaseCode()->code . '00001';
        }
    }


    protected function getBaseCode()
    {
        return json_decode(optional(Baseinfo::query()->where('id', $this->unitRequesterId)->first())->extra_value);
    }

    protected function fixFormat($counter)
    {
        if (strlen($counter) == 5) {
            return $counter;
        }
        return $this->fixFormat('0' . $counter);
    }
}
