<?php

namespace App\Orchid\Layouts;

use App\Models\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'post';

    protected function striped(): bool
    {
        return true;
    }
    protected function onEachSide(): int
    {
        return 5;
    }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [

            TD::make('title', 'Title')
                ->filter(Input::make())
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.post.edit', $post);
                })->sort(),

            TD::make('categories_id', 'Category')->filter(Input::make())->render(function ($post) {
                return $post->categories->slug;
            })->sort(),
            TD::make('created_at', 'Created')->filter(Input::make())->sort(),
            TD::make('updated_at', 'Last edit')->filter(Input::make())->sort(),

        ];
    }
}
