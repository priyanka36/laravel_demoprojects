<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function categoryCreate(Request $request)
    {
        return view('backend.distillary.category.category-create');

    }

    public function categoryList()
    {
        $data['categoryListIndex'] = 1;
        $data['categoryListData'] = Category::select('*')->orderBy('created_at', 'ASC')->get();
        $data['beverages']=DB::table('whiskies')
            ->join('rums','whisky_id','=','whisky.id')
            ->join('gins','whisky_id','=','whisky.id')
            ->join('vodkas','whisky_id','=','whisky.id')
            ->select('whisky.*','rum.*','gin.name','gin.gin_photo','gin.gin_about','gin.gin_description','vodka.name','vodka.vodka_photo','vodka.vodka_about','vodka.vodka_description','vodka.name')
            ->get();
        return view('backend.distillary.category.category-list', $data);
    }



    public function categoryStore(Request $request)
    {
//       dd($request->all());
        $request->validate(
            [

                'title' => 'required',
                'location' => 'required',
                'description' => 'required',
                'skills' => 'required',
                'requirement' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'location.required' => 'Location Is Required.',
                'description.required' => 'Description Is Required.',
                'skills.required' => 'Skills Is Required.',
                'requirement.required' => 'Requirements Is Required.'


            ]


        );

        try {

            $category = new Category();
            $category->title = $request->input('title');
            $category->location = $request->input('location');
            $category->description = $request->input('description');
            $category->skills = $request->input('skills');
            $category->requirement = $request->input('requirement');


            //$category->added_by_user_id = $this->authUserId;


            $category->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.categoryList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editCategoryDetail(Request $request, $category)
    {

        $data['categoryEditDetail'] = Category::select('*')->where('id', $category)->first();
        return view('backend.distillary.category.category-edit', $data);

        //
    }

    public function updateCategoryDetail($Id, Request $request)
    {

        $request->validate(
            [

                'title' => 'required',
                'location' => 'required',
                'description' => 'required',
                'skills' => 'required',
                'requirement' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'location.required' => 'Location Is Required.',
                'description.required' => 'Description Is Required.',
                'skills.required' => 'Skills Is Required.',
                'requirement.required' => 'Requirements Is Required.'




            ]


        );

        try {

            $category = Category::findOrFail($Id);
            $category->title = $request->input('title');
            $category->location = $request->input('location');
            $category->description= $request->input('description');
            $category->skills= $request->input('skills');
            $category->requirement = $request->input('requirement');
            $category->updated_by_user_id = $this->authUserId;






            $category->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.categoryList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteCategory($id)
    {
        $deleteCategory = Category::find($id)->delete();
        if ($deleteCategory) {
            return redirect()->route('backend.categoryList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
