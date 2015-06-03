<?php namespace App\Http\Controllers\Frontend;

use app\Antony\DomainLogic\Modules\Categories\Base\CategoryEntity;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Response;

class CategoriesController extends Controller
{

    protected $category;

    /**
     * @param CategoryEntity $repository
     */
    public function __construct(CategoryEntity $repository)
    {
        $this->category = $repository;
    }

    /**
     * Display a listing of the resource.
     * GET /categories
     *
     * @return Response
     */
    public function index()
    {
        // display a listing of all categories. sort of a sitemap
        $categories = $this->category->displayCategoryListing();

        return view('frontend.categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     * GET /categories/{id}
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     *
     */
    public function show(Request $request, Category $category)
    {
        // retrieve the category id, and display all related products, regardless of sub-category
        $data = $this->category->displayCategoryAndRelatedProducts($category, $request);

        return view('frontend.categories.display')
            ->with('category', array_get($data, 'cat'))
            ->with('products', array_get($data, 'pages'));
    }

}