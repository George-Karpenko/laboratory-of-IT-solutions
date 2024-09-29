<?php

namespace App\Orchid\Screens\Slide;

use App\Models\Slide;
use App\Orchid\Layouts\Slide\SlideSortableLayout;
use App\Orchid\Screens\BaseScreen;
use Orchid\Screen\Actions\Link;

class SlideSortableScreen extends BaseScreen
{

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Set a position');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('slide');
    }

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'slide' => Slide::sorted()->get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return static::label();
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Create new'))
                ->icon('bs.pencil')
                ->route('platform.slide.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SlideSortableLayout::class,
        ];
    }
}
