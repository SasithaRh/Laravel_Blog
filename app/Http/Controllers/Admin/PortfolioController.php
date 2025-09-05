<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\GD\Driver;
use Intervention\Image\ImageManager;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolio = Portfolio::latest()->get();
       return view('admin.portfolio.index',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create_portfolio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
       $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        //dd($data);
  if ($request->hasFile('portfolio_image')) {
        $file = $request->file("portfolio_image");
        $extension = $file->getClientOriginalExtension();
        $imagename = time() . "." . $extension;
        $path = public_path("upload/portfolio/");

        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Resize and save the image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname()); // Read from temporary path
        $image->resize(1020,519);
        $image->save($path . $imagename); // Save to final path

        $data['portfolio_image'] = 'upload/portfolio/' . $imagename;
    }
        Portfolio::create($data);
        $notification = array(
            'message'=>'Portfolio Created Successfully!',
            'alert-type'=>'success'
        );
        return redirect('portfolio')->with($notification );

    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio,$id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit_portfolio',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $editportfoliopage = Portfolio::find($request->id);
// dd($editportfoliopage->portfolio_image);
            $data = $request->validated();
             if(!$request->file('portfolio_image')){

                $data['portfolio_image'] = $editportfoliopage->portfolio_image;
             }else{
                $portfolioimg = $editportfoliopage->portfolio_image;
                $filename = $portfolioimg;
                 unlink($filename);

         $file = $request->file("portfolio_image");
        $extension = $file->getClientOriginalExtension();
        $imagename = time() . "." . $extension;
        $path = public_path("upload/portfolio/");

        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Resize and save the image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname()); // Read from temporary path
        $image->resize(1020,519);
        $image->save($path . $imagename); // Save to final path
         $data['portfolio_image'] = 'upload/portfolio/' . $imagename;
             }

        Portfolio::findOrFail($request->id)->update($data);
        $notification = array(
            'message'=>'Portfolio Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect('portfolio')->with($notification );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio,$id)
    {
        $Portfolio = Portfolio::findOrFail($id);
        $Portfolioimg = $Portfolio->portfolio_image;
        $filename = $Portfolioimg;
        unlink($filename);

        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Portfolio Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

     public function portfolio_details($id)
    {
        $portfoliodetails = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfoliodetails'));
    }
    public function home_portfolio()
    {
        $portfoliodetails = Portfolio::all();
        return view('frontend.home_portfolio',compact('portfoliodetails'));
    }
}
