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
use Symfony\Component\HttpFoundation\Request;

class PostListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'PostListScreen';
    public $posts;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {

        $this->posts = Post::with('categories')->latest()->filters()->paginate();
        return [
            // want to export this key
            'post' => $this->posts
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
                ->parameter(['posts' => $this->posts])
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

    public function export($posts, Request $request)
    {
        dd($posts);
        //export query key from here

        $this->query->get('post');
    }
}
