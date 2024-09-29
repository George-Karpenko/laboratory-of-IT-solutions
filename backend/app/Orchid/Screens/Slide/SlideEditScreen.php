<?php

namespace App\Orchid\Screens\Slide;

use App\Models\Slide;
use App\Orchid\Screens\BaseScreen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class SlideEditScreen extends BaseScreen
{

    public static function label(): string
    {
        return __('Slides');
    }

    public static function singularLabel()
    {
        return __('slide');
    }


    /**
     * @var Slide
     */
    public $slide;

    /**
     * Query data.
     *
     * @param Slide $slide
     *
     * @return array
     */
    public function query(Slide $slide): iterable
    {
        return [
            'slide' => $slide
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->slide->exists ? static::editName() : static::createName();
    }


    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(static::createButtonLabel())
                ->icon('bs.pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->slide->exists),

            Button::make(__('Update'))
                ->icon('bs.pencil')
                ->method('createOrUpdate')
                ->canSee($this->slide->exists),

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->slide->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows(
                [
                    Input::make('slide.title')
                        ->type('text')
                        ->max(20)
                        ->required()
                        ->title('Title')
                        ->placeholder('Enter a title'),

                    TextArea::make('slide.sub_title')
                        ->type('text')
                        ->maxlength(50)
                        ->rows(2)
                        ->required()
                        ->title('Sub title')
                        ->placeholder('Enter a sub-title'),

                    Input::make('slide.url')
                        ->type('text')
                        ->max(255)
                        ->required()
                        ->title('Url')
                        ->placeholder('Enter a url'),

                    Cropper::make('slide.photo')
                        ->required()
                        ->width(1920)
                        ->height(1421)
                        ->targetRelativeUrl()
                        ->title('Large web banner image'),
                ]
            )
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $route = $this->slide->id ? 'platform.slide.list' : 'platform.slide.sortable';
        $this->slide->fill($request->get('slide'))->save();

        Alert::info(__('You have successfully created a :resource.', ["resource" => static::singularLabel()]));

        return redirect()->route($route);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->slide->delete();

        Alert::info(__('You have successfully deleted the :resource.', ["resource" => static::singularLabel()]));

        return redirect()->route('platform.slide.list');
    }
}
