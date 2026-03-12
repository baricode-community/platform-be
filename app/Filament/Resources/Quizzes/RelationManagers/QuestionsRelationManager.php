<?php

namespace App\Filament\Resources\Quizzes\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $recordTitleAttribute = 'question_text';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('question_text')
                    ->required()
                    ->label('Question')
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Order'),
                Repeater::make('options')
                    ->relationship()
                    ->schema([
                        TextInput::make('option_text')
                            ->required()
                            ->label('Option Text')
                            ->columnSpan(2),
                        TextInput::make('score')
                            ->numeric()
                            ->default(0)
                            ->label('Score')
                            ->helperText('Points added when selected.'),
                        Toggle::make('is_correct')
                            ->label('Correct Answer'),
                    ])
                    ->columns(4)
                    ->columnSpanFull()
                    ->label('Options')
                    ->addActionLabel('Add Option')
                    ->minItems(2)
                    ->defaultItems(2)
                    ->reorderable(false)
                    ->collapsible(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width('50px'),
                TextColumn::make('question_text')
                    ->label('Question')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('options_count')
                    ->label('Options')
                    ->counts('options'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
