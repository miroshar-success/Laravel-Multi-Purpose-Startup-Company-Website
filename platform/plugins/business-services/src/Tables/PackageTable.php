<?php

namespace Botble\BusinessService\Tables;

use Botble\BusinessService\Models\Package;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\EnumColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\Columns\YesNoColumn;
use Illuminate\Database\Eloquent\Builder;

class PackageTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Package::class)
            ->addActions([
                EditAction::make()->route('business-services.packages.edit'),
                DeleteAction::make()->route('business-services.packages.destroy'),
            ]);
    }

    public function query(): Builder
    {
        return $this->applyScopes(
            $this->getModel()
                ->query()
                ->select([
                    'id',
                    'name',
                    'price',
                    'duration',
                    'is_popular',
                    'created_at',
                    'status',
                ])
        );
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            NameColumn::make()->route('business-services.packages.edit'),
            Column::make('price')
                ->title(trans('plugins/business-services::business-services.price'))
                ->width(100),
            EnumColumn::make('duration')
                ->title(trans('plugins/business-services::business-services.duration'))
                ->width(100),
            YesNoColumn::make('is_popular')
                ->title(trans('plugins/business-services::business-services.is_popular'))
                ->width(100),
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('business-services.packages.create'), 'business-services.packages.create');
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('business-services.packages.destroy'),
        ];
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }
}
