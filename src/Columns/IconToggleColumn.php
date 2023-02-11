<?php

namespace Maaz1n\FilamentIconToggleColumn\Columns;

use Closure;
use Filament\Tables\Columns\ToggleColumn;

class IconToggleColumn extends ToggleColumn
{
    protected string $view = 'filament-icon-toggle-column::columns.icon-toggle-column';

    public function icon(Closure|string $icon): static
    {
        $this->onIcon($icon)->offIcon($icon);

        return $this;
    }
}
