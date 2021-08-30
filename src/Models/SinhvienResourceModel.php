<?php

namespace MVC\Models;

use MVC\Models\SinhvienModel;
use MVC\Core\ResourceModel;

class SinhvienResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init("sinhvien", "id", new SinhvienModel);
    }
}
