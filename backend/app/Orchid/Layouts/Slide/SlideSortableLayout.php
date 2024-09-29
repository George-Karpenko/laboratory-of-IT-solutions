<?php

namespace App\Orchid\Layouts\Slide;

use App\Models\Slide;
use App\Orchid\Screens\Slide\SlideListScreen;
use Illuminate\Support\Facades\Cache;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;
use Orchid\Screen\Layouts\Sortable;
use Orchid\Screen\Sight;

class SlideSortableLayout extends Sortable
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'slide';

    /**
     * Get the table cells to be displayed.
     *
     * @return Sight[]
     */
    protected function columns(): iterable
    {
        return [
            Sight::make('id')
                ->render(fn(Slide $slide) => // Please use view('path')
                "<img src='{$slide->photo}'
                    alt='sample'
                    class='mw-100 d-block img-fluid rounded-1'
                    style='width: 100px'>
                <span class='small text-muted mt-1 mb-0'># {$slide->id}</span>"),
            Sight::make('title')
                ->render(function (Slide $slide) {
                    return Link::make($slide->title)
                        ->route('platform.slide.edit', $slide);
                }),
            Sight::make('sub_title'),

            Sight::make(__('Actions'))
                ->render(fn(Slide $slide) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.slide.edit', $slide->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the :resource is deleted, all of its resources and data will be permanently deleted. Before deleting :resource, please download any data or information that you wish to retain.', ['resource' => SlideListScreen::singularLabel()]))
                            ->method('remove', [
                                'id' => $slide->id,
                            ]),
                    ])),
        ];
    }

    public function successSortMessage(): string
    {
        Cache::forget('slide');
        return parent::successSortMessage();
    }
}
