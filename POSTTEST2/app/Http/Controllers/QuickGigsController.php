<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gig;

class QuickGigsController extends Controller
{
    public function index()
    {
        $categories = Category::with(['gigs' => function($query) {
            $query->take(4);
        }])->get();
        
        $featuredGigs = Gig::with(['category', 'user'])
            ->where('is_active', true)
            ->orderBy('orders_count', 'desc')
            ->take(8)
            ->get();

        return view('quickgigs.index', compact('categories', 'featuredGigs'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $gigs = Gig::with(['category', 'user'])
            ->where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('rating', 'desc')
            ->paginate(12);

        return view('quickgigs.category', compact('category', 'gigs'));
    }

    public function show($slug)
    {
        $gig = Gig::with('user', 'category')->where('slug', $slug)->firstOrFail();
        
        // Get related gigs from the same category
        $relatedGigs = Gig::with('user', 'category')
            ->where('category_id', $gig->category_id)
            ->where('id', '!=', $gig->id)
            ->take(4)
            ->get();
            
        return view('quickgigs.show', compact('gig', 'relatedGigs'));
    }
    
    public function search()
    {
        $query = Gig::with('user', 'category');
        $categories = Category::all();
        
        // Search by title or description
        if (request('q')) {
            $searchTerm = request('q');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Filter by category
        if (request('category')) {
            $query->whereHas('category', function($q) {
                $q->where('slug', request('category'));
            });
        }
        
        // Filter by price range
        if (request('price_range')) {
            switch (request('price_range')) {
                case '0-25':
                    $query->where('price', '<=', 25);
                    break;
                case '25-50':
                    $query->whereBetween('price', [25, 50]);
                    break;
                case '50-100':
                    $query->whereBetween('price', [50, 100]);
                    break;
                case '100+':
                    $query->where('price', '>', 100);
                    break;
            }
        }
        
        // Filter by delivery time
        if (request('delivery')) {
            $query->where('delivery_time', '<=', request('delivery'));
        }
        
        // Sort results
        switch (request('sort')) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'popular':
                $query->orderBy('orders_count', 'desc');
                break;
            default:
                $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
                break;
        }
        
        $gigs = $query->paginate(12)->withQueryString();
        
        return view('quickgigs.search', compact('gigs', 'categories'));
    }
}
