<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use App\Models\Candidate;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('candidate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($offre_id)
    {
        $offre = Offre::findOrFail($offre_id);
        return view('candidate.create', compact('offre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $offre_id=$request->input('offre_id');
        $request->validate([
            'image'=>'required|mimes:jpg,png,jpeg|max:5048',
            'resume'=>'required|mimes:pdf,jpg,png,jpeg|max:5048',
            'cover_letter'=>'required|mimes:pdf,jpg,png,jpeg|max:5048',
        ]);
        
    $resumeFileName = uniqid() . '.' . $request->file('resume')->getClientOriginalExtension();
    $coverLetterFileName = uniqid() . '.' . $request->file('cover_letter')->getClientOriginalExtension();
    $imageFileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

    $request->file('resume')->move('./public/candidatefiles', $resumeFileName);
    $request->file('cover_letter')->move('./public/candidatefiles', $coverLetterFileName);
    $request->file('image')->move('./public/candidatefiles', $imageFileName);


        Candidate::create([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'date_naissance'=>$request->input('date_naissance'),
            'resume'=>$resumeFileName,
            'cover_letter'=>$coverLetterFileName,
            'image'=>$imageFileName,
            'user_id'=>auth()->user()->id,
            'offre_id'=>$offre_id
            

        ]);
        return redirect('/offre');
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
    public function edit($candidate_id, $offre_id)
    {
        $candidate = Candidate::findOrFail($candidate_id);
        $offre = Offre::findOrFail($offre_id);

        return view('candidate.edit', compact('candidate', 'offre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
        $offre_id=$request->input('offre_id');
        $request->validate([
            'image'=>'required|mimes:jpg,png,jpeg|max:5048',
            'resume'=>'required|mimes:pdf,jpg,png,jpeg|max:5048',
            'cover_letter'=>'required|mimes:pdf,jpg,png,jpeg|max:5048',
        ]);
        
    $resumeFileName = uniqid() . '.' . $request->file('resume')->getClientOriginalExtension();
    $coverLetterFileName = uniqid() . '.' . $request->file('cover_letter')->getClientOriginalExtension();
    $imageFileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

    $request->file('resume')->move('./public/candidatefiles', $resumeFileName);
    $request->file('cover_letter')->move('./public/candidatefiles', $coverLetterFileName);
    $request->file('image')->move('./public/candidatefiles', $imageFileName);

    Candidate::where('id',$id)->update([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'date_naissance'=>$request->input('date_naissance'),
            
            'resume'=>$resumeFileName,
            'cover_letter'=>$coverLetterFileName,
            'image'=>$imageFileName,
            'user_id'=>auth()->user()->id,
            'offre_id'=>$offre_id
            

        ]);
            $user_id = auth()->user()->id;
            $user = User::findOrFail($user_id);
        $candidates = $user->candidate()->with('offre')->get();

    return view('candidate.show-Mycandidates', compact('user', 'candidates'));
   

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
        Candidate::where('id',$id)
        ->delete();
        $user_id = auth()->user()->id;
        
        return redirect('/my-candidates/'.$user_id);
    }
    public function showMycandidates($id)
    {
        //
    
    // $offre = Offre::find($id);
    // $candidates = $offre->candidate;
    // $user = User::findOrFail($id);
    // $candidates = $user->candidate()->with('offre')->get();
    
    
    // return view('candidate.show-Mycandidates', compact('offre','user', 'candidates'));
    // $user = User::findOrFail($id);
    
    // $candidates = $user->candidate()->with('offre')->get()->groupBy('offre_id');
    
    // return view('candidate.show-Mycandidates', compact('user', 'candidates'));
    $candidates = Candidate::where('user_id', $id)->with('offre', 'offre.user')->get();
    $offres = $candidates->pluck('offre')->unique();
    $user = User::findOrFail($id);

    return view('candidate.show-Mycandidates', compact('offres', 'user', 'candidates'));

      
    }


        public function viewFile($id,$file)
    {
        $candidate = Candidate::find($id);

        $filePath = public_path('./public/candidatefiles/' . $file);

        return response()->file($filePath);
    }

}
