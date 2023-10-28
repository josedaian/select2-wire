<?php

namespace JoseDaian\Select2\Tests\Livewire;

use Illuminate\Encryption\Encrypter;
use JoseDaian\Select2\Tests\Livewire\Components\ComponentUsingTrait;
use Orchestra\Testbench\TestCase;
use Livewire\Livewire;

class Select2WireTraitTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            \Livewire\LivewireServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(Encrypter::generateKey($app['config']['app.cipher'])));
    }


    /** @test */
    public function it_dispatches_browser_event_from_trait()
    {
        Livewire::test(ComponentUsingTrait::class)
            ->assertDispatchedBrowserEvent('select2wire.init');
    }
}
