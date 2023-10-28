<?php

namespace JoseDaian\Select2\Tests\Livewire\Components;

use JoseDaian\Select2\Traits\HasSelect2Wire;
use Livewire\Component;

class ComponentUsingTrait extends Component
{
    use HasSelect2Wire;

    public function render()
    {
        $this->initSelect2();
        return <<<'blade'
            <div></div>
        blade;
    }
}
