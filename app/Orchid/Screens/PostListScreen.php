<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use App\Orchid\Layouts\PostListLayout;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class PostListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'PostListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {

        return [
            'post' => Post::with('categories')->latest()->filters()->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Export All Applied Filter Result From Table')
                ->method('export')
                ->icon('cloud-download')
                ->rawClick()
                ->novalidate(),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            PostListLayout::class,
        ];
    }
}
