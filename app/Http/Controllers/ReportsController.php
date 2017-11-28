<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $role = Auth::user()->role_id;
        switch ($role) {
      case '1':
      return view('dashboard.document');
      break;
      case '2':
      return view('lptsi.document');
      break;
      case '3':
      return view('webadmin.document');
      break;
      case '4':
      // $user = User::all();
      $reports = Report::all();
      $categories = Category::all();
      return view('asprak.reports-index', compact('reports', 'categories'));
      break;
      case '5':
      $user = Auth::user();
      $reports = $user->report;
      $categories = Category::all();
      return view('praktikan.reports-index', compact('reports', 'categories'));
      break;
      default:
      return back();
      break;
        // $user = Auth::user();
        // $reports = $user->report;
        // $categories = Category::all();
        // if (Auth::user()->role_id == 5) {
        //     return view('praktikan.reports-index', compact('reports', 'categories'));
        // } else {
        //     return redirect()->back()->with('status', 'Forbidden');
        // }
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if (Auth::user()->role_id == 5) {
            return view('praktikan.reports-create', compact('categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role_id == 5) {
            $this->validate($request, [
          'title'     => 'required',
          'category'  => 'required',
          'description'   => 'required',
          'solution'   => 'required',
      ]);

            $report = new Report([
          'title'     => $request->input('title'),
          'user_id'   => Auth::user()->id,
          'report_code' => strtoupper(str_random(10)),
          'category_id'  => $request->input('category'),
          'description'   => $request->input('description'),
          'solution'   => $request->input('solution'),

      ]);
            $report->save();
            return redirect()->back()->with("status", "Report dengan ID: #$report->report_code telah dibuat.");
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($report_code)
    {
        if (Auth::user()->role_id ==5) {
            $user=Auth::user();
            $userReports = $user->report()->where('user_id', $user->id);

            if ($userReports->count() > 0) {
                $report = Report::where('report_code', $report_code)->with('document')->firstOrFail();
                $document = $report->document;
                $category = $report->category;
                return view('praktikan.reports-show', compact('report', 'category', 'document'));
            } else {
                return redirect()->back()->with('status', 'Forbidden');
            }
        }

        if (Auth::user()->role_id ==4) {
            $user=Auth::user();
            $userReports = $user->report->all();


            $report = Report::where('report_code', $report_code)->with('document')->firstOrFail();
            $document = $report->document;
            $category = $report->category;
            return view('asprak.reports-show', compact('report', 'category', 'document'));
        } else {
            return redirect()->back()->with('status', 'Forbidden');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
