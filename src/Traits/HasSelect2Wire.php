<?php

namespace JoseDaian\Select2\Traits;

trait HasSelect2Wire
{
    public function initSelect2()
    {
        $this->dispatchBrowserEvent('select2wire.init');
    }
}