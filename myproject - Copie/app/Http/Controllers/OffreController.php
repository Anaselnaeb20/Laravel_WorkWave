<?php

namespace App\Http\Controllers;

use App\Models\Offre;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offre.index')
        ->with('offres',Offre::get());
       
        
    }
//     public function landingPage()
// {
//     $offresForLandingPage = Offre::take(3)->get();

//     return view('index', [
//         'offres' => $offresForLandingPage,
//     ]);
// }

    // show the offres of an HR
    public function showOffres($id){
        
        $offres = Offre::where('user_id', $id)->get();
        return view('offre.show-offres', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('offre.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'titre'=>'required','ville'=>'required','pays'=>'required','description'=>'required','societe'=>'required','contenu'=>'required', 'type_contrat'=>'required','salair'=>'required',

        //     ]
        //     );
            $slug=Str::slug($request->titre);

            Offre::create([ 
                'titre'=>$request->input('titre'),
                'ville'=>$request->input('ville'),
                'pays'=>$request->input('pays'),
                'description'=>$request->input('descreption'),
                'societe'=>$request->input('societe'),
                'contenu'=>$request->input('contenue'),
                'slug'=>$slug,
                'type_contrat'=>$request->input('type_contrat'),
                'salair'=>$request->input('salair'),
                'user_id'=>auth()->user()->id
                
            ]);
            return redirect('/offre');
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('offre.show')
        ->with('offre', Offre::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        return view('offre.edit')
        ->with('offre',Offre::where('slug',$slug)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
       
        Offre::where('slug',$slug)
        ->update([
                'titre'=>$request->input('titre'),
                'ville'=>$request->input('ville'),
                'pays'=>$request->input('pays'),
                'description'=>$request->input('descreption'),
                'societe'=>$request->input('societe'),
                'contenu'=>$request->input('contenue'),
                'slug'=>$slug,
                'type_contrat'=>$request->input('type_contrat'),
                'salair'=>$request->input('salair'),
                'user_id'=>auth()->user()->id

        ]);
        return redirect('/offre/'.$slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        Offre::where('slug',$slug)->delete();
        return redirect('/offre');
    }

    public function showCandidates($id)
{
    $offre = Offre::find($id);
    $candidates = $offre->candidate;
    foreach ($candidates as $candidate) {
        $birthday = Carbon::parse($candidate->date_naissance);
        $date_naissance = $birthday->diffInYears(Carbon::now());
        $candidate->date_naissance = $date_naissance;
    }
    $count = $offre->candidate()->count();
    
    return view('offre.show-candidates', compact('offre', 'candidates','count'));
    
}


}
