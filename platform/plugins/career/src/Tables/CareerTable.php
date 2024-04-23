<?php

namespace ArchiElite\Career\Tables;

use ArchiElite\Career\Models\Career;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\NameBulkChange;
use Botble\Table\BulkChanges\StatusBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;

class CareerTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Career::class)
            ->addActions([
                EditAction::make()->route('careers.edit'),
                DeleteAction::make()->route('careers.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make()->route('careers.edit')->alignLeft(),
                CreatedAtColumn::make(),
                StatusColumn::make(),
            ])
            ->addHeaderAction(CreateHeaderAction::make()->route('careers.create'))
            ->addBulkActions([
                DeleteBulkAction::make()->permission('careers.destroy'),
            ])
            ->addBulkChanges([
                NameBulkChange::make(),
                StatusBulkChange::make(),
                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'created_at',
                    'status',
                ]);
            });
    }
}
