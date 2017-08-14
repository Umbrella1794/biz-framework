<?php

namespace Codeages\Biz\Framework\Order\Status;

class CloseStatus extends AbstractStatus
{
    protected $status = 'closed';

    public function getPriorStatus()
    {
        return array('created');
    }
}