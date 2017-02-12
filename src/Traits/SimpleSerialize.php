<?php

namespace jamesvweston\EasyPost\EasyPost\Traits;

trait SimpleSerialize
{

    /**
     * @return array
     */
    protected function simpleSerialize()
    {
        return get_object_vars($this);
    }

}