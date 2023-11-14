<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const TAGS = 'tags';
    const PRICES = 'prices';
    const ORDER = 'order';

    protected function getCallbacks(): array
    {
        $callbacks = [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::TAGS => [$this, 'tags'],
            self::PRICES => [$this, 'prices'],
            self::ORDER => [$this, 'order'],
        ];

        return $callbacks;
    }

    protected function categories(Builder $builder, $value): void
    {
        $builder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value): void
    {
        $builder->whereHas('colors', function ($b) use ($value) {
            $b->whereIn('color_id', $value);
        });
    }

    protected function tags(Builder $builder, $value): void
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }

    protected function prices(Builder $builder, $value): void
    {
        $builder->whereBetween('price', $value);
    }

    protected function order(Builder $builder, $value): void
    {
        $acceptedFields = ['title', 'price'];
        $acceptedSorts = ['asc', 'desc'];
        [$fieldName, $sortOrder] = explode('|', $value, 2);

        if (in_array($fieldName, $acceptedFields) && in_array(strToLower($sortOrder), $acceptedSorts)) {
            $builder->orderBy($fieldName, $sortOrder);
        }
    }
}
