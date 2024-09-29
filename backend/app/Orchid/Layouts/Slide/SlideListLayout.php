<?php

namespace App\Orchid\Layouts\Slide;

use App\Models\Slide;
use App\Orchid\Screens\Slide\SlideListScreen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Illuminate\Support\Str;

class SlideListLayout extends Table
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
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')
                ->sort()
                ->width('100')
                ->render(fn(Slide $slide) => // Please use view('path')
                "<img src='{$slide->photo}'
                    alt='sample'
                    class='mw-100 d-block img-fluid rounded-1 w-100'>
                <span class='small text-muted mt-1 mb-0'># {$slide->id}</span>"),
            TD::make('title', __('Title'))
                ->sort()
                ->render(function (Slide $slide) {
                    return Link::make($slide->title)
                        ->route('platform.slide.edit', $slide);
                }),
            TD::make('sub_title', __('Sub title')),
            TD::make('url', __('Url'))
                ->render(function (Slide $slide) {
                    return Link::make(Str::limit($slide->fullUrl, 40, '...'))
                        ->href($slide->fullUrl);
                }),
            TD::make('order', __('Order'))
                ->sort()
                ->render(function (Slide $slide) {
                    return $slide->order + 1;
                }),

            TD::make('created_at', __('Created'))
                ->sort(),
            TD::make('updated_at', __('Last edit'))
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
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
}
