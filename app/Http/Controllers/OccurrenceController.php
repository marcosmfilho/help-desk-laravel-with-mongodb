<?php


namespace App\Http\Controllers;


use App\Occurrence;
use App\OccurrenceStatus;

use Illuminate\Http\Request;


class OccurrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $active = 'occurrences';
        
        $resolvedOccurrences = Occurrence::getResolvedoOccurrences();
        $unresolvedOccurrences = Occurrence::getUnresolvedoOccurrences();
        
        $total = Occurrence::count();
        $urgent = Occurrence::where('priority', '3')->count();
        $resolved = Occurrence::where('status', 1)->count();
        $unresolved = Occurrence::where('status', 2)->count();

        return  view('occurrences.index',
                compact('active', 
                        'resolvedOccurrences',
                        'unresolvedOccurrences', 
                        'total', 
                        'urgent', 
                        'resolved', 
                        'unresolved'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myOccurrences()
    {
        $active = 'my_occurrences';

        $this->user =  \Auth::user();
        
        $occurrences = Occurrence::where('userID', $this->user->id)->orderBy('created_at', 'desc')->get();
        
        $total = Occurrence::where('userID', $this->user->id)->count();
        $urgent = Occurrence::where(['userID' => $this->user->id, 'priority' => '3'])->count();
        $resolved = Occurrence::where(['userID' => $this->user->id, 'status' => 1])->count();
        $unresolved = Occurrence::where(['userID' => $this->user->id, 'status' => 2])->count();

        return  view('occurrences.me',
                compact('active', 
                        'occurrences', 
                        'total', 
                        'urgent', 
                        'resolved', 
                        'unresolved'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'occurrences';
        return view('occurrences.create',compact('active'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'category' => 'required'
        ]);

        $this->middleware('auth');
        $this->user =  \Auth::user();

        $params = $request->all();
        $params['userID'] = $this->user->id;
        $params['status'] = OccurrenceStatus::UNRESOLVED;

        Occurrence::create($params);
        
        return redirect()->route('myOccurrences')
                        ->with('success','Occurrence created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Occurrence $occurrence)
    {
        $active = 'occurrences';
        return view('occurrences.show',compact('occurrence', 'active'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function edit(Occurrence $occurrence)
    {
        return view('occurrences.edit',compact('occurrence'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occurrence $occurrence)
    {
        request()->validate([
            'response'
        ]);

        $params = $request->all();
        $params['status'] = OccurrenceStatus::RESOLVED;

        $occurrence->update($params);

        $active = 'occurrences';
        return view('occurrences.show',compact('occurrence', 'active'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occurrence $occurrence)
    {
        $occurrence->delete();


        return redirect()->route('occurrences.index')
                        ->with('success','Occurrence deleted successfully');
    }
}