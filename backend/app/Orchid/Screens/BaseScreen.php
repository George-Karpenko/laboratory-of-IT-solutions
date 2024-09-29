<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

abstract class BaseScreen extends Screen
{

    /**
     * Get the text for the create breadcrumbs.
     *
     * @return string
     */
    abstract public static function label();


    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    abstract public static function singularLabel();

    /**
     * Get the text for the list breadcrumbs.
     *
     * @return string
     */
    public static function listBreadcrumbsMessage(): string
    {
        return static::label();
    }

    /**
     * Get the text for the create breadcrumbs.
     *
     * @return string
     */
    public static function createBreadcrumbsMessage(): string
    {
        return __('New :resource', ['resource' => static::singularLabel()]);
    }

    /**
     * Get the text for the edit breadcrumbs.
     *
     * @return string
     */
    public static function editBreadcrumbsMessage(): string
    {
        return __('Edit :resource', ['resource' => static::singularLabel()]);
    }

    /**
     * Get the text for the create resource title.
     *
     * @return string|null
     */
    public static function createName(): string
    {
        return __('Creating a new :resource', ['resource' => static::singularLabel()]);
    }

    /**
     * Get the text for the edit resource title.
     *
     * @return string|null
     */
    public static function editName(): string
    {
        return __('Edit :resource', ['resource' => static::singularLabel()]);
    }

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel(): string
    {
        return __('Create :resource', ['resource' => static::singularLabel()]);
    }
}
