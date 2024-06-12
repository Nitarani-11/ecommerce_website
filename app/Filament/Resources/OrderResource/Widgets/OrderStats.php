<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
// use Faker\Core\Number;
use App\Helpers\Number;
use Filament\Forms\Components\Tabs\Tab;
// use Illuminate\Http\Request;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $averagePrice = Order::query()->avg('grand_total');
        $formattedPrice = Number::currency($averagePrice, '₹');
        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count()),
            Stat::make('In Progress Orders', Order::query()->where('status', 'processing')->count()),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Average Price', $formattedPrice),
            // Stat::make('Average Price', Number::currency(Order::query()->avg('grand_total'), 'INR'))
        ];
    }

    
}

