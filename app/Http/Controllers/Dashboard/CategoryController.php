<?php

namespace App\Http\Controllers\Dashboard;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller {

	public function index(Request $request) {
		$categories = Category::when($request->search, function ($query) use ($request) {

			return $query->where('name', 'like', '%' . $request->search . '%');

		})->latest()->paginate(5);
		return view('dashboard.categories.index', compact('categories'));
	}

	public function create() {
		return view('dashboard.categories.create');

	}

	public function store(Request $request) {

		$rules = [];

		foreach (config('translatable.locales') as $locale) {

			$rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];

		} //end of for each

		$request->validate($rules);

		Category::create($request->all());
		session()->flash('success', __('site.added_successfully'));
		return redirect()->route('dashboard.categories.index');
	}

	public function show(Category $category) {

	}

	public function edit(Category $category) {
		//$user = User::find($user);
		return view('dashboard.categories.edit', compact('category'));
	}

	public function update(Request $request, Category $category) {
		$rules = [];

		foreach (config('translatable.locales') as $locale) {

			$rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];

		} //end of for each

		$request->validate($rules);

		$category->update($request->all());
		session()->flash('success', __('site.updated_successfully'));
		return redirect()->route('dashboard.categories.index');
	}

	public function destroy(Category $category) {
		$category->delete();
		session()->flash('success', ('site.deleted_successfully'));
		return redirect()->route('dashboard.categories.index');
	}
}
