<?php

namespace App\Orchid\Screens\Slide;

use App\Models\Slide;
use App\Orchid\Layouts\Slide\SlideListLayout;
use App\Orchid\Screens\BaseScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Toast;

class SlideListScreen extends BaseScreen
{

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Slides');
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
            'slide' => Slide::filters()->defaultSort('id', 'desc')->get()
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
                ->route('platform.slide.create'),
            Link::make(__('Set a position'))
                ->icon('bs.sort-down-alt')
                ->route('platform.slide.sortable')
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
            SlideListLayout::class,
        ];
    }


    public function remove(Request $request): void
    {
        Slide::findOrFail($request->get('id'))->delete();

        Toast::info(__(':resource was removed', ['resource' => static::singularLabel()]));
    }
}
