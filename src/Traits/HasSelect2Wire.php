<?php

namespace JoseDaian\Select2\Traits;

trait HasSelect2Wire
{
    public function initSelect2()
    {
        $this->dispatch('select2wire.init');        
    }
}
