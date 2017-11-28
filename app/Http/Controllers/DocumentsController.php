<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Document;
use App\Report;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class DocumentsController extends Controller
{
    /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
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
      $documents = Document::all();
      return view('webadmin.document', compact('documents'));
      break;
      case '4':
      // $user = User::all();
      $documents = Document::all();
      return view('asprak.document', compact('documents'));
      break;
      case '5':
      $user = Auth::user();
      $documents = $user->document;
      return view('praktikan.document-index', compact('documents'));
      break;
      default:
      return back();
      break;
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
      $reports = Auth::user()->report;
      // dd($report);
    // $reports = Report::where('user_id','=',Auth::user->id)->get();
    // dd($category);
      return view('praktikan.document-create', compact('categories', 'reports'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
      $document = new Document([
        'user_id' => Auth::user()->id,
        'report_id' => $request->input('report'),
        'category_id' => $request->input('category'),
        'filename' => $request->file('user_file')->store('uploads'),
        'mime' => $request->file('user_file')->getClientMimeType(),
        'original_filename' => $request->file('user_file')->getClientOriginalName(),

      ]);
      $document->save();
      return redirect()->back()->with("status", "Saved");
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
      //
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
