<?php

namespace App\Filament\Resources\Quizzes\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Quiz Title')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->label('Description'),

                Toggle::make('is_active')
                    ->label('Active')
                    ->helperText('Only active quizzes are shown on the frontend.')
                    ->columnSpanFull(),

                Repeater::make('questions')
                    ->relationship()
                    ->label('Questions')
                    ->columnSpanFull()
                    ->addActionLabel('Add Question')
                    ->defaultItems(1)
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['question_text'] ?? 'New Question')
                    ->schema([
                        TextInput::make('question_text')
                            ->required()
                            ->label('Question')
                            ->columnSpanFull(),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->label('Order')
                            ->helperText('Lower number = shown first.'),

                        Repeater::make('options')
                            ->relationship()
                            ->label('Options')
                            ->columnSpanFull()
                            ->addActionLabel('Add Option')
                            ->minItems(2)
                            ->defaultItems(2)
                            ->reorderable(false)
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
                                    ->label('Correct')
                                    ->inline(false),
                            ])
                            ->columns(4),
                    ]),
            ]);
    }
}
